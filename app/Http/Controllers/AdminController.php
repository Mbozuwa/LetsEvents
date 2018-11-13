<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    /**
     * This function checks if the user is in face an admin (if the user is not an admin he'll be redirected back)
     * Then retrieve all the users and return the view
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role_id != 2) {
            return redirect('/');
        }
        $users = \App\user::all();
        $activities = "";
        return view('admin' ,['users' => $users, 'activities' => $activities]);
        }
        else {
            return redirect('/logout');
        }
        
    }
}
