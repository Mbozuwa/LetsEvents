<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Registration;
use App\Category_event;
use App\Categories;
use App\User;
use Auth;

class EventController extends Controller
{
    public function index($id) {
       $event = \App\event::find($id);
       $user = Auth::user();
       $organiser = \App\User::find($user['id']);
       $attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $id)->get();
       $count = \App\Registration::where('event_id', $id)->where('status' , "Ik ga")->get()->count();
       $originalDate = $event['begin_time'];
	   $newDate = date("d-m-Y H:i", strtotime($originalDate));
	   $originalDateEnd = $event['end_time'];
	   $newDateEnd = date("d-m-Y H:i", strtotime($originalDateEnd));
       return view('event' ,['event' => $event, 'attendence' => $attendence, 'count' => $count, 'user' =>$user, 'newDate'=> $newDate, 'newDateEnd' => $newDateEnd, 'organiser' => $organiser]);
    }

    public function delete($id) {
        $user = Auth::user();
        $event = Event::where(array('user_id' => $user['id'], 'id' => $id));
        $event->delete();
        return redirect('/events/made');
    }



    public function allEvents() {
        $events = Event::get();
        // $category = Category_event::get();
        // dd($events);
        // $count =Registration::where('event_id', $id)->where('status' , "Ik ga")->get()->count();
        $events = Event::orderBy('begin_time', 'asc')->paginate(2);
    return view('events/index', ['events' => $events /*, 'category' => $category*/]);
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
        $post->description = $request->input('description');
        $post->place = $request->input('place');
        $post->address = $request->input('address');
        $post->max_participant = $request->input('max_participant');
        $date_begin = $request['begin_time'];
        $correctDate= date("Y-m-d H:i", strtotime($date_begin));
        $post->begin_time = $correctDate;

        $date_end = $request['end_time'];
        $correctDateEnd= date("Y-m-d H:i", strtotime($date_end));
        $post->end_time = $correctDateEnd;
        $post->payment = $request->input('payment');
        $post->user_id = $user->id;
        // $post->end_time = $request->input('end_time');
        // dd($post);
        $post->save();
        return redirect('/events/index');
    }

    public function edit($id) {
        $event = Event::find($id);
        $date_begin = $event['begin_time'];
        $correctDate= date("d-m-Y H:i", strtotime($date_begin));
        $date_end = $event['end_time'];
        $correctDate2= date("d-m-Y H:i", strtotime($date_end));
        // $categories = Categories::get();
        return view('/events/edit', ['event' => $event, 'correctDate' => $correctDate, 'correctDate2' => $correctDate2]);
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
            'user_id' => 'required',
        ]);


        $post = Event::find($id);
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->place = $request->input('place');
        $post->address = $request->input('address');
        $post->max_participant = $request->input('max_participant');
        $date_begin = $request['begin_time'];
        $correctDate= date("Y-m-d H:i", strtotime($date_begin));
        $post->begin_time = $correctDate;

        $date_end = $request['end_time'];
        $correctDateEnd= date("Y-m-d H:i", strtotime($date_end));
        $post->end_time = $correctDateEnd;
        $post->payment = $request->input('payment');
        $post->user_id = $user->id;
        $post->save();
        return redirect('/events/made');
    }
    public function myEvents() {
        $user = Auth::user();
        $registrations = Registration::where('user_id' , $user['id'])->where('status' , "Ik ga")->get();
        $date = date('Y-m-d H:i:s');
        $date = strtotime($date);
        $count = Registration::where('user_id' , $user['id'])->where('status' , "Ik ga")->get()->count();
        $countEvents = \App\event::all()->count();
        return view('myEvents',['registrations' => $registrations, 'date' => $date, 'count' => $count, 'countEvents' => $countEvents]);
    }

    public function madeEvents() {
        $user = Auth::user();
        $userEvents = Event::where('user_id', $user['id'])->paginate(2);
        return view('/events/made', ['userEvents' => $userEvents, ]);
    }

    /*
    *The info function gets all the users that are registered with an event that is in the $id.
    *The auth user gets the current logged in user.
    *
    */
    public function info($id) {
        $user = Auth::user();
        $event = Event::find($id);
        // $category = Event::find($id)->category()->get();
        $registered = Registration::where(['event_id' => $id])->where('status' , "Ik ga")->get();

        // dd($registered);
        return view('events/info', ['registered' => $registered, 'event' => $event, 'user' => $user]);
    }
    public function chooseCategoryWithEvent($id) {
        $user = Auth::user();
        $userEvents = Event::where(['user_id'=> $user['id'], 'id' => $id ])->paginate(2);
        $categoryEvents = Event::find($id)->category()->get();
        $categories = categories::all();
        return view('/events/categories', ['userEvents' => $userEvents, 'categoryEvents' => $categoryEvents, 'categories' => $categories]);
        // $test = new Category_event;
        // $event = Event::where('id',$id)->get();
        // $test->event_id = $id;
        // $test->category_id = $request->input('category_id');
        // $test->save();
    }
    public function saveCategory(Request $request,$id){
        $saveCategory = new Category_event;
        // dd($request);
        // $event = Event::where('id',$id)->get();
        $saveCategory->category_id = $request->input('category_name');
        $saveCategory->event_id = $id;
        $saveCategory->save();
        return redirect()->back()->with('success', 'De categorie is aangemaakt.');
        // $category->event_id = $request->input($event_id);
        // $event = Event::find($event-id);

        
        
    }
}
