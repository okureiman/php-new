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

Route::group(['prefix'=>'admin','middleware'=> 'auth'], function () {
    //ニュース新規登録画面
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    //ニュース登録済一覧
    Route::get('news', 'Admin\NewsController@index');
});

// 課題1

Route::group(['prefix'=>'admin'], function () {
    Route::get('news/create', 'Admin\AAAcontroller@BBB');
});

// 課題2

Route::group(['prefix'=>'admin'], function () {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth'); // PHP/Laravel 13 課題3
    Route::post('profile/create', 'Admin\ProfileController@create')->middleware('auth');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    // PHP/Laravel 12 　課題2
    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
    // PHP/Laravel 12 　課題3
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
    Route::get('news', 'Admin\NewsController@index')->middleware('auth'); //追記　ニュース一覧
    Route::get('profile', 'Admin\ProfileController@index')->middleware('auth'); //追記 プロフィール一覧
    Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth'); //追記
    Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth'); //追記
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth'); //追記
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'NewsController@index');

// PHP/Laravel 13 課題6

Route::group(['prefix'=>'admin','middleware'=> 'auth'], function () {
    Route::post('profile/edit', 'Admin\ProfileController@update');
});
