<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StyleController extends Controller
{
    public function index() {
      $title = 'Style';
      return view('style-test.index', compact('Style'));
    }
}
