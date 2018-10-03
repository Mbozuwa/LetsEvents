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



Route::get('/index', 'StartController@index');
Route::get('/events', 'StartController@event');
Route::get('/', 'StartController@home');
Route::get('start/getEvents', 'StartController@getEvents');
Route::get('/event/{id}', 'eventController@index');
Route::get('/registration/1/{id}', 'registrationController@userGoing');
Route::get('/registration/2/{id}', 'registrationController@userMaybe');
Route::get('/registration/3/{id}', 'registrationController@userNotGoing');
Route::get('event/{id}', 'EventController@index');
Route::get('/notificationDelete', 'HomeController@notificationDelete');
Route::post('/profile/update', 'ProfileController@update');
Route::get('/events/user','EventController@myEvents');
Route::post('/profile/{id}', 'ProfileController@upload');

Route::get('/events/index/','EventController@allEvents');
Route::get('events/create', 'EventController@create');
Route::post('events/create', 'EventController@store');
Route::get('events/made', 'EventController@MadeEvents');
Route::get('/delete/{id}', 'EventController@delete');
Route::get('/events/edit/{id}', 'EventController@edit');
Route::post('/events/update/{id}', 'EventController@update')->name('updateEvent');
Route::get('events/category/{id}', 'EventController@chooseCategory');
Route::post('events/category/{id}', 'EventController@saveCategory');

Route::get('/categories/{id}', 'CategoriesController@show');

Route::get('/logout', [
  'uses' => 'UserController@getLogout',
  'as' => 'user.logout'
]);

Route::get('/profile/{id}', function () {
    return view('profile.profile');
});

Route::post('profile', [
  'uses' => 'ProfileController@upload',
  'as' => 'profile.profile'
]);

Route::get('/editprofile/{id}',[
    'uses' => 'UserController@edit',
    'as' => 'profile.edit'
]);

Route::group(['middleware' => 'auth'] ,function() {
Route::get('/profile/{id}',[
    'uses' => 'profileController@getProfile',
    'as' => 'profile.profile'
]);
Route::get('events/info/{id}', 'EventController@info');
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
// Route::get('signin', function () { return redirect('user/signin'); })->name('login');
// Route::get('signup', function () { return redirect('user/signup'); })->name('register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('student','StudentController');
Route::get('/student/index/{id}', 'StudentController@index');