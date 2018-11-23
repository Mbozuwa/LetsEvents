<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use JavaScript;
use Auth;
use Session;


class StartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function event()
     /**
     * Return view event.show
     */
      {
          return view('events.show');
      }

    public function index()
     /**
     * Return view index
     */ 
     {
         return view('index');
     }

    public function home()
    /**
     * Save user info in session and return view welcome.
     */
    {
        $user = Auth::user();
        session(['user' => $user]);
        return view('welcome');
    }

    public function getEvents()
    /**
     * Retrieve all events
     * Foreach all events and save necessary info in variable calendarEvents
     * Return calendarEvents to json
     */
    {
        $calendarEvents = [];
        $events = \App\event::all();
        $user = Auth::user();
        foreach ($events as $event) {
            $attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $event['id'])->pluck('status');
            array_push($calendarEvents,$event['name']." | ".$event['begin_time']." | ".$event['id']." | ". $attendence);
            

        }

        return response()->json($calendarEvents);
    }
}
