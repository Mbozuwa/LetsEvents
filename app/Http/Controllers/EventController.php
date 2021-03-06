<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Registration;
use App\PaymentStatus;
use App\CategoryEvent;
use App\Category;
use App\User;
use App\Mail\Registered;
use App\Mail\MailReminder;
use Carbon\Carbon;


use \File;
use Mail;
use Auth;
use Validator;

use Mail;
use App\Mail\MailReminder;

use \Input as Input;

class EventController extends Controller
{

    /**
     * All events
     */

    public function index() {
        $events = Event::get();
        $name = "";
    return view('events/index', ['events' => $events , 'name' => $name]);
    }

    /**
     * All events with a specific name
     */

    public function indexSearch($name) {
        $events = Event::get();
    return view('events/index', ['events' => $events, 'name' => $name]);
    }

    /**
     * showing an event and it details for the person who made it
     */

    public function show($id) {
        $event = \App\event::find($id);

        if (Event::where(array('id' => $id))->exists())
        {
            if(Auth::user())
            {
                $paymentStatus = \App\PaymentStatus::where('user_id', Auth::user()->id)->where('event_id', $event['id'])->get();
                if (isset($paymentStatus[0])) {
                    $paymentStatus = $paymentStatus[0]['payment_status'];
                }
            }else{
                $paymentStatus = 0;
            }
            $user = Auth::user();
            $organiser = \App\User::find($event['user_id']);
            $attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $id)->get();
            $count = \App\Registration::where('event_id', $id)->where('status' , "Ik ga")->get()->count();
            return view('event' ,['event' => $event, 'attendence' => $attendence, 'count' => $count, 'user' =>$user,'organiser' => $organiser, 'paymentStatus' => $paymentStatus]);
        }
        else
        {
            return abort(404);
        }
    }



    /**
     * ? showing the view to create an event.
     */

    public function create() {
        return view('events/create');
    }

    /**
     * making an event with required fields and storing the data in the database
     */

    public function store(Request $request) {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:1400',
            'place' => 'required|regex:^[a-zA-Z.\s]+$^',
            'address' => 'required|between:1,30|regex:^[a-zA-Z\d.\s]+$^',
            'max_participant' => 'required|alpha_num',
            'max_participant' => 'required|numeric|min:2',
            'begin_time' => 'required',
            'end_time' => 'required',
            'image' => 'required',
            'payreminder' => 'numeric|min:1'
        ]);

        $post = new Event();
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->place = $request->input('place');
        $post->address = $request->input('address');
        $post->max_participant = $request->input('max_participant');
        $post->begin_time = date("Y-m-d H:i", strtotime($request->input('begin_time')));
        $post->end_time = date("Y-m-d H:i", strtotime($request->input('end_time')));
        $post->payment = $request->input('payment');
        $post->signup_time = date("Y-m-d H:i", strtotime($request->input('signup_time')));
        if(empty($request->input('signup_time')))
        {
            $post->signup_time = $post->begin_time;
        }
        if(!empty($request->input('signup_time')))
        {
            if(strtotime($request->input('signup_time')) >= strtotime($request->input('end_time')))
            {
                //Some error bc signup_time is equal or higher then end_time.
                return redirect()->back()->with('error', __('msg.EventController.store.error'));
            }
        }

        $post->payment_reminder = 0;

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
                return view('/events/edit', ['event' => $event]);
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
            'max_participant' => 'required|numeric|min:2',
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
        $post->begin_time = date("Y-m-d H:i", strtotime($request['begin_time']));
        $post->end_time = date("Y-m-d H:i", strtotime($request['end_time']));
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
     * Deletes the event from the user it belongs to
     */

    public function delete($id) {
        $user = Auth::user();
        $event = Event::where(array('user_id' => $user['id'], 'id' => $id));

        if($event != null) {
            if (Event::where(array('user_id' => $user['id'], 'id' => $id))->exists())
            try{
                    $event->delete();
                    return redirect('/events/made')->with('success', __('msg.EventController.delete.success'));
                }
                catch (\Exception $e) {
                    return redirect()->back()->with('error', __('msg.EventController.delete.error'));
                }
            }
            else{
                return redirect()->back();
            }
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
                try {
                    Mail::to($user->email)->send(new Registered($event, $user));
                } catch(\Exception $e) {
                    return redirect()->back()->with('error', __('msg.reminder.send.error'));
                }

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
     * getting the events form a user with time and date using the user id
     */
    public function myEvents() {
            $user = Auth::user();
            $registrations = Registration::where('user_id' , $user['id'])->where('status' , "Ik ga")->get();

            $count = Registration::where('user_id' , $user['id'])->where('status' , "Ik ga")->get()->count();
            $countEvents = \App\event::all()->count();
            return view('myEvents',['registrations' => $registrations, 'count' => $count, 'countEvents' => $countEvents]);
    }

    /**
     * getting all the events form a user that he made
     */

    public function madeEvents()
    {
      
        $user = Auth::user();
        $events = Event::where('user_id', $user['id'])->whereDate('end_time', '>=', Carbon::now()->toDateString())->paginate(4);
        $date = date('Y-m-d');
        $e = false;
        // dd($events);
        $date2 = date('Y-m-d', strtotime("+1 month"));
        return view('events.made', ['events' => $events, 'date' => $date, 'date2' => $date2,'e' => $e]);
    }

    /**
     * show old events that you made
     */

    public function allMadeEvents()
    {
        $user = Auth::user();
        $date = date('Y-m-d');
        $date2 = date('Y-m-d', strtotime("+1 month"));
        $e = true;
        $events = Event::where(['user_id' => $user['id']])->paginate(2);
        return view('/events/made', ['events' => $events, 'date' => $date, 'date2' => $date2, 'e' => $e]);

    }

    }

    public function datesBetween(Request $request){
        $user = Auth::user();
        $begin_date = $request->input('date');
        $end_date = $request->input('date2');
        $date = date('Y-m-d');
        $e = true;
        $date2 = date('Y-m-d', strtotime("+1 month"));
            if($begin_date != "" && $end_date != "") {
                $events = Event::where('user_id', $user['id'])

                    ->whereDate('begin_time', '>=', $begin_date)
                    ->whereDate('end_time', '<=', $end_date)
                    ->paginate(4);

            return view('/events/made', ['events' => $events, 'date' => $date, 'date2' => $date2, 'e' => $e]);
        }
        else {
            return redirect()->back();
        }
    }

    /*
    *the function gets all the registerd users for a specific event.
    */

    public function info($id) {
        $eventUser = Event::find($id);
        $usersPaid = PaymentStatus::where('event_id' , $id)->get()->count();
        $usersMaybe = Registration::where('event_id' , $id)->where('status' , 'Misschien')->get()->count();
        $usersNotGoing = Registration::where('event_id' , $id)->where('status' , 'Ik ga niet')->get()->count();
        $usersGoing = Registration::where('event_id' , $id)->where('status' , 'Ik ga')->get()->count();
        $usersGoing = $usersGoing - $usersPaid;
        if (Auth::id() == $eventUser->user_id || Auth::user()->role_id == 2){

            $user = Auth::user();
            $event = Event::find($id);
            $registeredUsers = Registration::where(['event_id' => $id])->where('status' , "Ik ga")->get();
            $registered = [];
            foreach ($registeredUsers as $registeredUser) {
                $userInfo = User::where('id', $registeredUser['user_id'])->get();
                $transaction = PaymentStatus::where('event_id' , $registeredUser['event_id'])->where('user_id' , $registeredUser['user_id'])->get();
                array_push($registered , [$registeredUser , $transaction, $userInfo]);
            }

            // dd($registered);
            return view('events/info', ['registered' => $registered, 'event' => $event, 'user' => $user, 'usersPaid' => $usersPaid, 'usersGoing' => $usersGoing, 'usersMaybe' => $usersMaybe, 'usersNotGoing' => $usersNotGoing]);
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

        //delete all records from the category events table to .....
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

    /**
     * Name is clearly, it sends a payment reminder
     */
    public function sendPaymentReminder(Request $request) {
        $eventId = $request->input('eventid');
        $userId = $request->input('userid');

        if (Event::find($eventId)){
            $event = Event::find($eventId);
            if (User::find($userId))
            {
                if($event->user_id == Auth::user()->id)
                {
                    $user = User::find($userId);
                    try {
                        Mail::to($user->email)->send(new MailReminder($event, $user));
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', __('msg.event.info.sendError'));
                    }
                }else{
                    return redirect()->back()->with('error', __('msg.event.info.sendPermission'));
                }
            }else{
                return redirect()->back()->with('error', __('msg.event.info.userNotfound'));
            }
        }else{
            return redirect()->back()->with('error', __('msg.event.info.eventNotfound'));
        }

        return redirect()->back()->with('message', __('msg.event.info.sendSuccess'));
    }
}