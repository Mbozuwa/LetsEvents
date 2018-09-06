<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProfileController extends Controller
{

    public function user($id) {
    $users = \App\users::find($id);
    dd($users);
    return view('profile' ,['profile' => $users]);
}


}
