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
       $count = \App\Registration::where('event_id', $id)->where('status' , "Ik ga")->get()->count();
       $originalDate = $event['begin_time'];
	   $newDate = date("d-m-Y H:i", strtotime($originalDate));
	   $originalDateEnd = $event['begin_time'];
	   $newDateEnd = date("d-m-Y H:i", strtotime($originalDateEnd));
       return view('event' ,['event' => $event, 'attendence' => $attendence, 'count' => $count, 'user' =>$user, 'newDate'=> $newDate, 'newDateEnd' => $newDateEnd]);
    }

    public function allEvents() {
        $events = Event::paginate(2);

        return view('Events/index')->with('events',$events);
    }
}
