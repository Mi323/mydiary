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
    Route::get('diary/edit', 'Admin\DiaryController@edit'); 
    Route::post('diary/edit', 'Admin\DiaryController@update');
    Route::get('diary/delete', 'Admin\DiaryController@delete');
    
    Route::get('mypage/create', 'Admin\MypageController@add');
    Route::post('mypage/create', 'Admin\MypageController@create');
    Route::post('mypage/edit', 'Admin\MypageController@update');
    Route::get('mypage/edit', 'Admin\MypageController@edit');
    Route::post('mypage/edit', 'Admin\MypageController@update');
    Route::get('mypage/show', 'Admin\MypageController@show');
    Route::get('mypage', 'Admin\MypageController@index');
    
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
