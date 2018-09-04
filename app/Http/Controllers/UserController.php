<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getSignup() {
      return view('user.signup');
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
        'telephone' => $request->input('telephone'),

      ]);
      $user->save();

      Auth::login($user);
      return view('welcome');
    }   

    public function getSignin() {
      return view('user.signin');
    }
    public function postSignin(Request $request)    {
      $this->validate($request, [
        'email' => 'email|required',
        'password' => 'required|min:4'
      ]);
      if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
          return view('welcome');
        } return redirect()->back();
    }

    public function getLogout() {
      Auth::logout();
      return redirect()->back();
    }
    public function getProfile($id) {
        $profile = User::find($id);

        return view('profile.profile', ['profile' => $profile]);
    }
}
