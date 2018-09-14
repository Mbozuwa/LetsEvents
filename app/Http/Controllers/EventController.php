<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Registration;
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
        $id = Event::find('id');
        // $count =Registration::where('event_id', $id)->where('status' , "Ik ga")->get()->count();
        $events = Event::orderBy('begin_time', 'asc')->paginate(2);
        return view('Events/index', ['events' => $events]);
    }
    public function create() {
        return view('events/create');
    }
    public function store(Request $request) {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'place' => 'required',
            'address' => 'required',
            'max_participant' => 'required',
            'begin_time' => 'required',
            'end_time' => 'required'
        ]);
        $post = new Event();
        $post->name = $request->input('name');
        $post->description = $request->input('name');
        $post->place = $request->input('place');
        $post->address = $request->input('address');
        $post->max_participant = $request->input('max_participant');
        $date_begin = $request['begin_time'];
        $correctDate= date("Y-m-d H:i", strtotime($date_begin));
        $post->begin_time = $correctDate;

        $date_end = $request['end_time'];
        $correctDateEnd= date("Y-m-d H:i", strtotime($date_end));
        $post->end_time = $correctDateEnd;

        // $post->end_time = $request->input('end_time');
        $post->user_id = $user->id;
        // dd($post);
        $post->save();
        return view('/home');
    }
}
