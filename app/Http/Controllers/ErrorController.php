<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    // Gives the 500.blade view with the error 500
    public function forbidden() {
        return view('errors.500');
    }

    // Gives the 404.blade view with the error 404
    public function pagenotfound() {
        return view('errors.404');
    }

    // Gives the 413.blade view with the error 413
    public function toLong() {
        return view('errors.413');
    }

    // Gives the 403.blade view with the error 403
    public function internal() {
        return view('errors.403');
    }
}
