<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getSignup() {
      return view('test-profile.signup');
    }
    public function postSignup(Request $request) {
      $this->validate($request, [
        'email' => 'email|required|unique:users',
        'password' => 'required|min:4',
        'name' => 'required|min:4'
      ]);
      $user = new User([
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'name' => $request->input('name')
      ]);
      $user->save();

      Auth::login($user);

      return redirect()->route('user.profile');
    }
    public function getSignin() {
      return view('user.signin');
    }
    public function postSignin(Request $request) {
      $this->validate($request, [
        'email' => 'email|required',
        'password' => 'required|min:4',
        'name' => 'required|min:4'
      ]);
      if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
          return redirect()->route('user.profile');
        } return redirect()->back();
    }

}
