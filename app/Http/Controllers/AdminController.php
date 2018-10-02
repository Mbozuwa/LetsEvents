<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id != 2) {
        	return redirect('/');
        }
        $users = \App\user::all();
        $activities = "";
        return view('admin' ,['users' => $users, 'activities' => $activities]);
    }
    public function activity($id)
    {
        if (Auth::user()->role_id != 2) {
        	return redirect('/');
        }
        $users = \App\user::all();
        $activities =\App\Event::where('user_id', $id)->get();
        return view('admin' ,['users' => $users, 'activities' => $activities]);
    }
}
