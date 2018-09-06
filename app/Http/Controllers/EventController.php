<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use Auth;

class EventController extends Controller
{
    public function index($id) {
    	 $event = \App\event::find($id);
       $user = Auth::user();
       $attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $id)->get();
       return view('event' ,['event' => $event, 'attendence' => $attendence]);
    }
}
