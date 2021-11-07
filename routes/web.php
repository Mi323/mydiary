<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('diary/create', 'Admin\DiaryController@add');
    
    Route::get('me/create', 'Admin\MypageController@add');
    Route::get('me/edit', 'Admin\MypageController@edit');
});