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

// EventController
Route::group(['middleware' => 'auth'] ,function() {
  Route::get('/event/{id}', 'EventController@index');
  Route::get('/events/user','EventController@myEvents');
  Route::get('/events/info/{id}', 'EventController@info');
  Route::get('/events/index/','EventController@allEvents');
  Route::get('/events/create', 'EventController@create');
  Route::get('/events/made', 'EventController@MadeEvents');
  Route::get('/events/delete/{id}', 'EventController@delete');
  Route::get('/events/edit/{id}', 'EventController@edit');
  Route::get('/events/category/{id}', 'EventController@chooseCategory');
  Route::get('/events/categories/{id}', 'EventController@CategoriesEvent');
  Route::get('/events/updateStatus/{id}/{status}', 'EventController@updateStatus');
  
  Route::post('/events/update/{id}', 'EventController@update')->name('updateEvent');
  Route::post('/events/create', 'EventController@store');
});


// ProfileController

Route::get('/profile/{id}', function () {
  return view('profile.profile');
});

Route::group(['middleware' => 'auth'] ,function() {
  Route::get('/ban/{id}', 'ProfileController@ban');
  Route::get('/unban/{id}', 'ProfileController@unban');
  Route::get('/profile/{id}',[
      'uses' => 'profileController@getProfile',
      'as' => 'profile.profile'
  ]);
  Route::get('/editprofile/{id}',[
    'uses' => 'UserController@edit',
    'as' => 'profile.edit'
  ]);
  
  Route::post('/profile/update', 'ProfileController@update');
  Route::post('/profile/{id}', 'ProfileController@upload');
  Route::post('/profile', 'ProfileController@upload');
});

// StartController
Route::get('/index', 'StartController@index');
Route::get('/events', 'StartController@event');
Route::get('/', 'StartController@home');
Route::get('start/getEvents', 'StartController@getEvents');

//registrationController
Route::get('/registration/1/{id}', 'registrationController@userGoing');
Route::get('/registration/2/{id}', 'registrationController@userMaybe');
Route::get('/registration/3/{id}', 'registrationController@userNotGoing');

//homeController
Route::get('/notificationDelete', 'HomeController@notificationDelete');
Route::get('/home', 'HomeController@index')->name('home');

//adminController
Route::get('/activity/{id}', 'AdminController@activity');
Route::get('/admin', 'AdminController@index');

//studentController
Route::resource('student','StudentController');
Route::get('/student/index/{id}', 'StudentController@index');

//categoryController
Route::get('/categories/{id}', 'CategoriesController@show');

//userController
Route::get('/logout', [
  'uses' => 'UserController@getLogout',
  'as' => 'user.logout'
]);


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

