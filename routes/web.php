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

Route::group(['prefix' => 'admin','middleware'=>'auth'], function() {
    Route::get('diary/create', 'Admin\DiaryController@add');
    Route::post('diary/create', 'Admin\DiaryController@create');
    Route::get('diary', 'Admin\DiaryController@index');
    
    Route::get('mypage/create', 'Admin\MypageController@add');
    Route::post('mypage/create', 'Admin\MypageController@create');
    Route::post('mypage/edit', 'Admin\MypageController@update');
    Route::get('mypage/edit', 'Admin\MypageController@edit');
    
    
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
