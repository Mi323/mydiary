<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MypageController extends Controller
{
    public function add()
    {
        return view('admin.me.create');
    }

    public function create()
    {
        return redirect('admin/me/create');
    }

    public function edit()
    {
        return view('admin.me.edit');
    }

    public function update()
    {
        return redirect('admin/me/edit');
    }
}
