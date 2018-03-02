<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function () {

    Route::any('admin/login', 'Admin\LoginController@login');
});

Route::group(['middleware' => ['web','admin.login']], function () {

    Route::get('admin/index', 'Admin\IndexController@index');
    Route::get('admin/info', 'Admin\IndexController@info');
    Route::get('admin/quit', 'Admin\LoginController@quit');
    Route::any('admin/pass', 'Admin\IndexController@pass');
});

