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

Route::get('/', 'TasksController@index');
Route::get('description', 'AccountController@description')->name('commons.description');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
// ユーザ機能
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController',['only' => ['index','show','destroy']]);
//ユーザーフォロー機能
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
    });
//タスク共有機能
     Route::group(['prefix' => 'tasks/{id}'], function () {
        Route::post('share', 'sharesController@store')->name('shares.share');
        Route::delete('unshare', 'sharesController@destroy')->name('shares.unshare');
        Route::get('shares', 'UsersController@shares')->name('users.shares');
    });
    
    Route::resource('tasks', 'TasksController');
    
    Route::get('account', 'AccountController@delete_confirm')->name('users.delete_confirm');
    
  });
  URL::forceScheme('https');