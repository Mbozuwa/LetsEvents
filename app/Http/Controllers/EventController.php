<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Registration;
use App\CategoryEvent;
use App\Category;
use App\User;
use Auth;
use Validator;

use \File;

use \Input as Input;

class EventController extends Controller
{

    /**
     * showing an event and it details for the person who made it
     */

    public function index($id) {
       $event = \App\event::find($id);
       $user = Auth::user();
       $organiser = \App\User::find($event['user_id']);
       $attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $id)->get();
       $count = \App\Registration::where('event_id', $id)->where('status' , "Ik ga")->get()->count();
       $originalDate = $event['begin_time'];
	   $newDate = date("d-m-Y H:i", strtotime($originalDate));
	   $originalDateEnd = $event['end_time'];
	   $newDateEnd = date("d-m-Y H:i", strtotime($originalDateEnd));
       return view('event' ,['event' => $event, 'attendence' => $attendence, 'count' => $count, 'user' =>$user, 'newDate'=> $newDate, 'newDateEnd' => $newDateEnd, 'organiser' => $organiser]);
    }

    /**
     * In an event changing if you are still going to an event or not
     */

    public function updateStatus(Request $request, $id, $status) {
        if($status == "Ik ga" || $status == "Misschien" || $status == "Ik ga niet")
        {
            $event = \App\event::find($id);
            $user = Auth::user();
            $attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $id)->first();
            $attendence->status = $status;
            $attendence->save();
            if ($status == "Ik ga") {
                session(['notification' => 'Je gaat naar het evenement: '.$event['name']]);
                session(['notificationAlarmDelete' => false]);
                session(['event_id' => $id]);
            }
            elseif ($status == "Misschien") {
                session(['notification' => 'Je gaat misschien naar het evenement: '.$event['name']]);
                session(['notificationAlarmDelete' => false]);
                session(['event_id' => $id]);
            }
            elseif ($status == "Ik ga niet") {
                session(['notification' => 'Je gaat niet naar het evenement: '.$event['name']]);
                session(['notificationAlarmDelete' => false]);
                session(['event_id' => $id]);
            }

            return redirect()->back()->with('message', 'Status succesvol bewerkt!');
        }
        else
        {
            return redirect()->back()->with('error', 'Niet gelukt!');
        }
    }

    /**
     * All events
     */

    public function allEvents() {
        $events = Event::get();
        $name = "";
    return view('events/index', ['events' => $events , 'name' => $name]);
    }

    /**
     * All events with a secific name
     */

    public function allEventsSearch($name) {
        $events = Event::get();

    return view('events/index', ['events' => $events, 'name' => $name]);
    }

    /**
     * ? @alex????
     */

    public function create() {
        return view('events/create');
    }

    /**
     * making an event with required fields and storing the data in the database
     */

    public function store(Request $request) {
        session(['rememberEvent' => $request->all()]);
       
        $user = Auth::user();
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:50',
            'description' => 'required|max:1400',
            'place' => 'required|regex:^[a-zA-Z.\s]+$^',
            'address' => 'required|between:1,30|regex:^[a-zA-Z\d.\s]+$^',
            'max_participant' => 'required|alpha_num',
            'begin_time' => 'required',
            'end_time' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->with($validator)->withInput();
        }
        //if else in of buiten de request
        

        $post = new Event();
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->place = $request->input('place');
        $post->address = $request->input('address');
        $post->max_participant = $request->input('max_participant');
        $date_begin = $request->input('begin_time');
        $correctDate= date("Y-m-d H:i", strtotime($date_begin));
        $post->begin_time = $correctDate;

        $date_end = $request->input('end_time');
        $correctDateEnd= date("Y-m-d H:i", strtotime($date_end));
        $post->end_time = $correctDateEnd;
        $post->payment = $request->input('payment');

        $post->signup_time = date("Y-m-d H:i", strtotime($request->input('signup_time')));
        if(empty($request->input('signup_time')))
        {
            $post->signup_time = $correctDate;
        }
        if(!empty($request->input('signup_time')))
        {
            if(strtotime($request->input('signup_time')) >= strtotime($request->input('end_time')))
            {
                //Some error bc signup_time is equal or higher then end_time.
                return redirect()->back()->with('error', __('msg.EventController.store.error'));
            }
        }

        if(Input::hasFile('image'))
        {
            $request->validate([
                'image' => 'dimensions:max_width=500,max_height=500'
            ]);

            $file     = Input::file('image');
            $fileExt   = $file->getClientOriginalExtension();
            $fileRename = time().'_'.uniqid().'.'.$fileExt;
            $uploadDir    = public_path('uploads/events');
            $file->move($uploadDir, $fileRename);
            $post->image = $fileRename;
        }

        $post->user_id = $user->id;
        $post->save();
        return redirect('/events/index');
    }

    /**
     * editing events from ur user id
     */

    public function edit($id) {
        $eventUser = Event::find($id);

        if ($eventUser == null) {
            return redirect()->back()->with('error', __('msg.EventController.edit.error1'));
        }
        else {
            if (Auth::id() == $eventUser->user_id || Auth::user()->role_id == 2)
            {
                $event = Event::find($id);
                $date_begin = $event['begin_time'];
                $correctDate= date("d-m-Y H:i", strtotime($date_begin));
                $date_end = $event['end_time'];
                $correctDate2= date("d-m-Y H:i", strtotime($date_end));
                return view('/events/edit', ['event' => $event, 'correctDate' => $correctDate, 'correctDate2' => $correctDate2]);
            }
        }
        return redirect()->back()->with('error', __('msg.EventController.edit.error2'));
    }

    /**
     * updating/overriding an events information
     */

    public function update(Request $request,$id) {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:1400',
            'place' => 'required|regex:^[a-zA-Z.\s]+$^',
            'address' => 'required|between:1,30|regex:^[a-zA-Z\d.\s]+$^',
            'max_participant' => 'required|alpha_num',
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
        $date_begin = $request['begin_time'];
        $correctDate= date("Y-m-d H:i", strtotime($date_begin));
        $post->begin_time = $correctDate;

        $date_end = $request['end_time'];
        $correctDateEnd= date("Y-m-d H:i", strtotime($date_end));
        $post->end_time = $correctDateEnd;
        $post->payment = $request->input('payment');

        if($request->hasFile('image'))
        {
            $request->validate([
                'image' => 'dimensions:max_width=500,max_height=500'
            ]);

            $file     = Input::file('image');
            $fileExt   = $file->getClientOriginalExtension();
            $fileRename = time().'_'.uniqid().'.'.$fileExt;
            $uploadDir    = public_path('uploads/events');

            //$event = Event::find($id);
            $currentImage = $uploadDir.'/'.$post->image;
            if (File::exists($currentImage)) {
                File::delete($currentImage);
            }

            $file->move($uploadDir, $fileRename);
            $post->image = $fileRename;
        }

        $post->save();
        return redirect('/events/made');
    }

    /**
     * getting the events form a user with time and date using the user id
     */

    public function myEvents() {
            $user = Auth::user();
            $registrations = Registration::where('user_id' , $user['id'])->where('status' , "Ik ga")->get();
            $date = date('Y-m-d H:i:s');
            $date = strtotime($date);
            $count = Registration::where('user_id' , $user['id'])->where('status' , "Ik ga")->get()->count();
            $countEvents = \App\event::all()->count();
            return view('myEvents',['registrations' => $registrations, 'date' => $date, 'count' => $count, 'countEvents' => $countEvents]);
    }

    /**
     * getting all the events form a user that he made
     */

    public function madeEvents() {
        $user = Auth::user();
        $userEvents = Event::where('user_id', $user['id'])->paginate(2);
        return view('/events/made', ['userEvents' => $userEvents]);
    }

    /**
     * Deletes the event from the user it belongs to
     */

    public function delete($id) {
        $user = Auth::user();
        $event = Event::where(array('user_id' => $user['id'], 'id' => $id));

        if($event != null) {
            if (Event::where(array('user_id' => $user['id'], 'id' => $id))->exists())
            {
                $event->delete();
                return redirect('/events/made')->with('success', __('msg.EventController.delete.success'));
            }
            else
            {
                return back()->with('error', __('msg.EventController.delete.error'));
            }
        }else{
            return redirect()->back();
        }
    }

    /*
    *The info function gets all the users that are registered with an event that is in the $id.
    *The auth user gets the current logged in user.
    */

    public function info($id) {
        $eventUser = Event::find($id);
        if (Auth::id() == $eventUser->user_id || Auth::user()->role_id == 2){

            $user = Auth::user();
            $event = Event::find($id);
            // $category = Event::find($id)->category()->get();
            $registered = Registration::where(['event_id' => $id])->where('status' , "Ik ga")->get();

            // dd($registered);
            return view('events/info', ['registered' => $registered, 'event' => $event, 'user' => $user]);
        }
        return redirect()->back()->with('error', __('msg.EventController.info.error'));
    }

    /**
     * choosing a categorie for an event
     */

    public function chooseCategoryWithEvent($id) {
        $user = Auth::user();
        $userEvents = Event::where(['user_id'=> $user['id'], 'id' => $id ])->paginate(2);
        $categoryEvents = Event::find($id)->categories()->get();
        $categories = Category::all();
        $categoryEvents = categoryEvent::where('event_id', $id)->get();

        return view('/events/categories', ['userEvents' => $userEvents, 'categoryEvents' => $categoryEvents, 'categories' => $categories]);
    }


    /**
     * Saving the category in to database
     */

    public function saveCategory(Request $request,$id){
        $catIds = $request->input('category_id');
        CategoryEvent::where('event_id',$id)->delete();
        
            if($catIds === null){
                return redirect()->back()->with('success', __('msg.EventController.saveCategory.success'));
            }
            
            foreach ($catIds as $catId) {
            $saveCategory = new CategoryEvent;
            $saveCategory->category_id = $catId;
            $saveCategory->event_id = $id;
            $saveCategory->save();

            }

        return redirect()->back()->with('success', __('msg.EventController.saveCategory.success'));

    }
}
