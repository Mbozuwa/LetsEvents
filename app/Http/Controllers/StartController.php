<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use JavaScript;


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

        foreach ($events as $event) {
            array_push($calendarEvents,$event['name']." | ".$event['begin_time']." | ".$event['id']);

        }

        return response()->json($calendarEvents);
    }
}
