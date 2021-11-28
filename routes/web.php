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

Route::group(['prefix' => 'me','middleware'=>'auth'], function() {
    Route::get('diary/create', 'Me\DiaryController@add');
    Route::post('diary/create', 'Me\DiaryController@create');
    Route::get('diary', 'Me\DiaryController@index');
    Route::get('diary/edit', 'Me\DiaryController@edit'); 
    Route::post('diary/edit', 'Me\DiaryController@update');
    Route::get('diary/delete', 'Me\DiaryController@delete');
    Route::get('diary/show', 'Me\DiaryController@show');

    
    Route::get('mypage/create', 'Me\MypageController@add');
    Route::post('mypage/create', 'Me\MypageController@create');
    Route::post('mypage/show', 'Me\MypageController@update');
    Route::get('mypage/edit', 'Me\MypageController@edit');
    Route::get('mypage/show', 'Me\MypageController@show');
    Route::get('mypage', 'Me\MypageController@index');
    
    Route::get('diary', 'DiaryController@index');
    
    
});


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('verified')->group(function() {

    // 本登録ユーザーだけ表示できるページ
    Route::get('verified',  function(){

        return '本登録が完了してます！';

    });

});