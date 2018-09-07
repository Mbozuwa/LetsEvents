<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use JavaScript;
use Auth;


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
     public function event() {
          return view('events.show');
      }

    public function index() {
         return view('index');
     }

    public function home()
    {
        return view('welcome');
    }

    public function getEvents()
    {
        $calendarEvents = [];
        $events = \App\event::all();
        $user = Auth::user();
        foreach ($events as $event) {
            $attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $event['id'])->pluck('status');
            array_push($calendarEvents,$event['name']." | ".$event['begin_time']." | ".$event['id']." | ". $attendence);
<<<<<<< HEAD
        }
=======
            

        }

>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
        return response()->json($calendarEvents);
    }
}