<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class RegistrationController extends Controller
{
    public function userGoing($id) {
    	$user = Auth::user();
    	$registration = new Registration([
        'user_id' => $user['id'],
        'event_id' => $id,
        'status' => "Ik ga",

      ]);
      $registration->save();
      $event = \App\event::find($id);
      $attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $id)->get();
       return view('event' ,['event' => $event, 'attendence' => $attendence]);
    }
    public function userMaybe($id) {
    	$user = Auth::user();
    	$registration = new Registration([
        'user_id' => $user['id'],
        'event_id' => $id,
        'status' => "Misschien",

      ]);
      $registration->save();
      $event = \App\event::find($id);
      $attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $id)->get();
       return view('event' ,['event' => $event, 'attendence' => $attendence]);
    }
    public function userNotGoing($id) {
    	$user = Auth::user();
    	$registration = new Registration([
        'user_id' => $user['id'],
        'event_id' => $id,
        'status' => "Ik ga niet",

      ]);
      $registration->save();
      $event = \App\event::find($id);
      $attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $id)->get();
       return view('event' ,['event' => $event, 'attendence' => $attendence]);
    }
}
