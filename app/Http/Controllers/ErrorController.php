<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function forbidden() {
        return view('errors.500');
    }

    public function pagenotfound() {
        return view('errors.404');
    }

    public function internal() {
        return view('errors.403');
    }
}
