<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index($id) {
    	 $event = \App\event::find($id);
         return view('event' ,['event' => $event]);
     }
}
