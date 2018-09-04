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

Route::get('/events', 'StartController@events');
Route::get('/index', 'StartController@index');
Route::get('/', 'StartController@home');
Route::get('/logout', [
  'uses' => 'UserController@getLogout',
  'as' => 'user.logout'
]);

Route::get('/profile', function () {
    return view('profile.profile');
});
Route::group(['middleware' => 'auth'] ,function() {
Route::get('/profile/{id}',[
    'uses' => 'UserController@getProfile',
    'as' => 'profile.profile'
]);
});

Route::group(['prefix' =>'user'], function() {
Route::group(['middleware' => 'guest'] ,function() {
    Route::get('/signup', [
          'uses' => 'UserController@getSignup',
          'as' => 'user.signup'
        ]);
        Route::post('/signup', [
          'uses' => 'UserController@postSignup',
          'as' => 'user.singup'
        ]);
        Route::get('/signin', [
          'uses' => 'UserController@getSignin',
          'as' => 'user.signin'
        ]);
        Route::post('/signin', [
          'uses' => 'UserController@postSignin',
          'as' => 'user.singin'
        ]);
    });
});
Route::get('login', function () { return redirect('user/signin'); })->name('login');
Route::get('register', function () { return redirect('user/signup'); })->name('register');
