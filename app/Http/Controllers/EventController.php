<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use Auth;

class EventController extends Controller
{
    public function index($id) {
<<<<<<< HEAD
		$event = \App\event::find($id);
		$user = Auth::user();
		$attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $id)->get();
		$count = \App\Registration::where('event_id', $id)->where('status' , "Ik ga")->get()->count();
		return view('event' ,['event' => $event, 'attendence' => $attendence, 'count' => $count, 'user' =>$user]);
    }
}
=======
    	 $event = \App\event::find($id);
       $user = Auth::user();
       $attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $id)->get();
       $count = \App\Registration::where('event_id', $id)->where('status' , "Ik ga")->get()->count();
       return view('event' ,['event' => $event, 'attendence' => $attendence, 'count' => $count, 'user' =>$user]);
    }
}
>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
