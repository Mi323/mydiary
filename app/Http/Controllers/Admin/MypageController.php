<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mypage;
use App\Diary;
use App\User;
use Auth;

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
      $this->validate($request, Mypage::$rules);
      // News Modelからデータを取得する
      $mypage = Mypage::find($request->id);
      // 送信されてきたフォームデータを格納する
      $mypage_form = $request->all();
      unset($mypage_form['_token']);

      // 該当するデータを上書きして保存する
      $mypage->fill($mypage_form)->save();

      return redirect('admin/user');
    }
}
