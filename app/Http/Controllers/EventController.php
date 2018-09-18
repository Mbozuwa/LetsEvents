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

    public function delete($id) {
        $user = Auth::user();
        $event = Event::where(array('user_id' => $user['id'], 'id' => $id));
        $event->delete();
        return redirect('/events/made');
    }

    public function edit($id) {
        $event = Event::find($id);
        return view('/events/edit', ['event' => $event]);
    }
    public function update(Request $request,$id) {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'place' => 'required',
            'address' => 'required',
            'max_participant' => 'required',
            'begin_time' => 'required',
            'end_time' => 'required',
            'user_id' => 'required'
        ]);
        $post = Event::find($id);
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->place = $request->input('place');
        $post->address = $request->input('address');
        $post->max_participant = $request->input('max_participant');
        $post->begin_time = $request->input('begin_time');
        $post->end_time = $request->input('end_time');
        $post->user_id = $user->id;
        $post->save();
        return redirect()->back();
    }

    public function allEvents() {
        $events = Event::get();
        // dd($events);
        // $count =Registration::where('event_id', $id)->where('status' , "Ik ga")->get()->count();
        $events = Event::orderBy('begin_time', 'asc')->paginate(2);
        return view('events/index', ['events' => $events]);
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
        $post->user_id = $user->id;
        // $post->end_time = $request->input('end_time');
        // dd($post);
        $post->save();
        return redirect('/events/index');
    }

    public function MadeEvents() {
        $user = Auth::user();
        $userEvents = Event::where('user_id', $user['id'])->paginate(2);
        return view('/events/made', ['userEvents' => $userEvents]);
    }

}
