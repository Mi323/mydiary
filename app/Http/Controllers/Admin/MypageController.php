<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Diary;
use App\User;

class MypageController extends Controller
{
    public function add()
    {
        return view('admin.mypage.create');
    }

    public function create()
    {
        return redirect('admin/mypage/create');
    }
    
    public function show()
    {
        
        
        return view('admin.mypage.show');
    }
    
    
    public function edit(Request $request)
     {
    
      return view('admin.mypage.edit');
    }


    public function update(Request $request)
    {
      // Validationをかける
      $this->validate($request, User::$rules);
      // News Modelからデータを取得する
      $user = User::find($request->id);
      // 送信されてきたフォームデータを格納する
      $form = $request->all();
      unset($form['_token']);

      // 該当するデータを上書きして保存する
      $user->fill($form)->save();

      return redirect('admin/mypage/show');
    }
    
    
}
