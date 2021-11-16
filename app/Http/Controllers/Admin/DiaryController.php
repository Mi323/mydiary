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
 
 ///diaryの編集
 public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $diary = Diary::find($request->id);
      if (empty($diary)) {
        abort(404);    
      }
      return view('admin.diary.edit', ['diary_form' => $diary]);
  }

///diaryの編集
  public function update(Request $request)
  {
      $this->validate($request, Diary::$rules);
      // News Modelからデータを取得する
      $diary = Diary::find($request->id);
      // 送信されてきたフォームデータを格納する
      $diary_form = $request->all();
      if ($request->remove == 'true') {
          $diary_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $diary_form['image_path'] = basename($path);
      } else {
          $diary_form['image_path'] = $diary->image_path;
      }
      
      unset($diary_form['image']);
      unset($diary_form['remove']);
      unset($diary_form['_token']);
      // 該当するデータを上書きして保存する
      $diary->fill($diary_form)->save();
      return redirect('admin/diary');
  }
  
  ///diaryの削除
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $diary = Diary::find($request->id);
      // 削除する
      $diary->delete();
      return redirect('admin/diary/');
  }  
}
