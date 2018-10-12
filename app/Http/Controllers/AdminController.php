<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
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
    public function activity($id)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id != 2) {
            return redirect('/');
        }
        $users = \App\user::all();
        $activities =\App\Event::where('user_id', $id)->get();
        return view('admin' ,['users' => $users, 'activities' => $activities]);
        }
        else {
            return redirect('/logout');
        }
    }
}
