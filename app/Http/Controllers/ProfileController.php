<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public function getProfile($id) {
        $profile = User::find($id);
        $user = Auth::user();
        return view('profile.profile', ['profile' => $profile]);
    }

    public function update(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'telephone' => 'required'
        ]);

        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->telephone = $request->input('telephone');
        
        $user->save();

        return redirect()->back();

    }
}