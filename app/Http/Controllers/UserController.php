<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class UserController extends Controller
{
    /*
    *This functions shows the view for the signup page
    *The  function returns the view to the register page when clicked on a link to the register page
    */
    public function getSignup() {
      return view('user/signup');
    }
    /*
    *This function tries to make a new user.
    *This function expects a reqeust from the sign up form.
    *It goes through the validation rules.
    *Then it creates a new user by putting the data in to the new user array (this is a method that is only used one time, after this method we used a different method to create a new instance of a class.)
    *Then it saves the new user and logs that user in and then returns to the welcome page.
    */
    public function postSignup(Request $request) {
      $this->validate($request, [
        'email' => 'email|required|unique:users',
        'password' => 'required|min:8|max:255',
        'name' => 'required|min:3',
        'address' => 'required',
        'telephone' => 'required|digits:10',
      ]);
      $user = new User([
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'name' => $request->input('name'),
        'address' => $request->input('address'),
        'role_id' => 1,
        'telephone' => $request->input('telephone')
      ]);
      $user->save();
      // $user->student()->save($user);

      Auth::login($user);
      return redirect()->back();
    }
    /*
    *This function gets the get request from the route to signin existing user.
    *The $columns is an array for the calendar that is shown on the sign in page.
    *Then it gets all events and returns them to the sign in page
    */
    public function getSignin() {
        $columns = [
            'begin_time AS start',
            /* 'end_time AS end', */
            'name AS title'
        ];
        $allEvents = Event::orderBy('begin_time', 'asc')->get($columns);
        $currentEvents = $allEvents->toJson();

        return view('user.signin', compact('currentEvents'));
    }
    /*
    *This function signs the user in to the session.
    *This function expexts a request from the sign in form.
    *Then it validates if the inputs are filled in and the password is a minimal of 4 chars.
    *Then in an if the function attempts to log in with the filled in credentials.
    *if the credentials are correct you get returned to the welcome page.
    *If the credentials are not correct you get returned back.
    *The second function validates the inputs of the login form and if the inputted data is correct the user gets logged in automaticcly.
    */
    public function postSignin(Request $request)    {
      $this->validate($request, [
        'email' => 'email|required',
        'password' => 'required|min:4'
      ]);
      if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
          return view('/welcome');
      } else return redirect()->back();
    }
    /*
    *This function trys to logout a logged in user.
    *The $columns is an array for the calendar that is shown on the sign in page.
    *Then it gets all events and returns them to the sign in page
    *Then it forgets the session and it logs outh the current logged in user and returns to the user signin page.
    */
    public function getLogout() {
        $columns = [
            'begin_time AS start',
            /* 'end_time AS end', */
            'name AS title'
        ];
        $allEvents = Event::orderBy('begin_time', 'asc')->get($columns);
        $currentEvents = $allEvents->toJson();

      session()->forget('notification');
      Auth::logout();
      return view('user/signin', compact('currentEvents'));
    }

}
