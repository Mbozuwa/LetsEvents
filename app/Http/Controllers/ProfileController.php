<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProfileController extends Controller
{

    public function index($id) {
    $users = \App\users::find($id);
    return view('profile' ,['profile' => $users]);
}


}
