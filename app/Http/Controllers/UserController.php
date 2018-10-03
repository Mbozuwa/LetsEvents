<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /*
    *These functions do the sign up of a new user.
    *The first function returns the view to the register page when clicked on a link to the register page
    *The second function validates the inputs of the register form and if the inputted data is correct it makes a new user in the database
    *And Then the user gets logged in automaticcly.
    */
    public function getSignup() {
      return view('user/signup');
    }
    public function postSignup(Request $request) {
      $this->validate($request, [
        'email' => 'email|required|unique:users',
        'password' => 'required|min:8|max:255',
        'name' => 'required|min:4',
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
    *These functions do the sign in existing user.
    *The first function returns the view to the login page when clicked on a link to the login page
    *The second function validates the inputs of the login form and if the inputted data is correct the user gets logged in automaticcly.
    */
    public function getSignin() {
      return view('user.signin');
    }
    public function postSignin(Request $request)    {
      $this->validate($request, [
        'email' => 'email|required',
        'password' => 'required|min:4'
      ]);
      if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
          return view('/welcome');
      } else return redirect()->back();
    }

    public function getLogout() {
      session()->forget('notification');
      Auth::logout();
      return view('user/signin');
    }

}
