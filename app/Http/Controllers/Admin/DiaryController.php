<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Diary;

class DiaryController extends Controller
{
    public function add()
  {
      return view('admin.diary.create');
  }
  
  public function create(Request $request)
  {
      
      $this->validate($request, Diary::$rules);
      
      $diary = new Diary;
      $form = $request->all();
      
      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $diary->image_path = basename($path);
      } else {
          $diary->image_path = null;
      }
      
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      
      // データベースに保存する
      $diary->fill($form);
      $diary->save();
      
      return redirect('admin/diary/create');
  }  
  
  // diary一覧作成で以下を追記
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Diary::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Diary::all();
      }
      return view('admin.diary.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
 
}
