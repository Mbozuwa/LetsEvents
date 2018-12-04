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

/* Choose another language and store it in the session */
Route::get('locale/change/{lang}', function($lang){
    Session::put('locale', $lang);
    return redirect()->back();
});

// EventController
Route::group(['middleware' => 'auth.custom'] ,function() {
  Route::get('/events/user','EventController@myEvents');
  Route::get('/events/info/{id}', 'EventController@info');
  Route::get('/events/create', 'EventController@create');
  Route::get('/events/made', 'EventController@MadeEvents');
  Route::get('/events/delete/{id}', 'EventController@delete');
  Route::get('/events/edit/{id}', 'EventController@edit');
  Route::get('/events/category/{id}', 'EventController@chooseCategory');
  Route::get('/events/categories/{id}', 'EventController@CategoriesEvent');
  Route::get('/events/updateStatus/{id}/{status}', 'EventController@updateStatus');
  Route::post('/events/update/{id}', 'EventController@update')->name('updateEvent');
  Route::post('events/categories/{id}', 'EventController@saveCategory');
  Route::get('events/categories/{id}', 'EventController@chooseCategoryWithEvent');


  Route::post('/events/update/{id}', 'EventController@update')->name('updateEvent');
  Route::post('/events/create', 'EventController@store');
});

    Route::get('/event/{id}', 'EventController@index');
    Route::get('/events/index/','EventController@allEvents');
    Route::get('/events/index/{name}','EventController@allEventsSearch');


// ProfileController
Route::group(['middleware' => 'auth'] ,function() {
  Route::get('/profile/{id}', function () {
    return view('profile.profile');
  });
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
Route::get('/notificationDeleteAlarm', 'HomeController@notificationAlarmDelete');
Route::get('/home', 'HomeController@index')->name('home');

//errorController
Route::group(['middleware' => 'auth'] ,function() {
  Route::get('/forbidden', 'ErrorController@forbidden')->name('forbidden');
  Route::get('/pagenotfound', 'ErrorController@pageNotFound')->name('notfound');
  Route::get('/data', 'ErrorController@toLong')->name('toLong');
  Route::get('/internal', 'ErrorController@internal')->name('internal');
});

//adminController
Route::get('/admin', 'AdminController@index');

//schoolController
Route::group(['middleware' => 'auth.custom'], function () {
Route::get('/school/index', 'SchoolController@index');

Route::get('/school/create', 'schoolController@create');
Route::post('/school/create', 'schoolController@store')->name('createSchool');

Route::get('/school/edit/{id}', 'schoolController@edit');
Route::post('/school/update/{id}', 'schoolController@update')->name('updateSchool');

Route::get('/school/delete/{id}', 'schoolController@delete');
Route::post('/school/delete/{id}', 'schoolController@delete');
});

//studentController
Route::get('/student/index','StudentController@index');
Route::get('/student/show', 'StudentController@show');
// Route::post('/student/show', 'StudentController@chooseSchool')->name('chooseSchool');
Route::post('/student/edit/{id}', 'StudentController@chooseSchool')->name('editStudent');
Route::get('/student/edit/{id}', 'StudentController@edit');


//categoryController
Route::get('/categories/{id}', 'CategoriesController@show');

//userController
Route::get('/logout', [
  'uses' => 'UserController@getLogout',
  'as' => 'user.logout'
]);
//mailcontrolller
Route::get('/mail', 'MailController@sendmail');
Route::post('/mail', 'MailController@sendmail');
Route::get('/sendReminder', 'MailController@sendEmailReminder');
Route::post('/sendReminder', 'MailController@sendEmailReminder');


Route::get('/sendPaymentReminder', 'MailController@sendEmailPaymentReminder');


// Route::post('/send', 'MailController@send');



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
