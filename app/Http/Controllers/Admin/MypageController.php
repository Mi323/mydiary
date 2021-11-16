<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function edit()
    {
        return view('admin.mypage.edit');
    }

    public function update()
    {
        return redirect('admin/mypage/edit');
    }
}
