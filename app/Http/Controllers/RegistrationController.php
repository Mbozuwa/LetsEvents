<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class RegistrationController extends Controller
{
    public function userGoing($id) {
<<<<<<< HEAD
      $user = Auth::user();
      $registration = new Registration([
=======
    	$user = Auth::user();
    	$registration = new Registration([
>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
        'user_id' => $user['id'],
        'event_id' => $id,
        'status' => "Ik ga",

      ]);
      $registration->save();
      $event = \App\event::find($id);
      $attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $id)->get();
      $count = \App\Registration::where('event_id', $id)->get()->count();
      return view('event' ,['event' => $event, 'attendence' => $attendence, 'count' => $count]);
    }
    public function userMaybe($id) {
<<<<<<< HEAD
      $user = Auth::user();
      $registration = new Registration([
=======
    	$user = Auth::user();
    	$registration = new Registration([
>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
        'user_id' => $user['id'],
        'event_id' => $id,
        'status' => "Misschien",

      ]);
      $registration->save();
      $event = \App\event::find($id);
      $attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $id)->get();
      $count = \App\Registration::where('event_id', $id)->get()->count();
      return view('event' ,['event' => $event, 'attendence' => $attendence, 'count' => $count]);
    }
    public function userNotGoing($id) {
<<<<<<< HEAD
      $user = Auth::user();
      $registration = new Registration([
=======
    	$user = Auth::user();
    	$registration = new Registration([
>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
        'user_id' => $user['id'],
        'event_id' => $id,
        'status' => "Ik ga niet",

      ]);
      $registration->save();
      $event = \App\event::find($id);
      $attendence = \App\Registration::where('user_id', $user['id'])->where('event_id', $id)->get();
      $count = \App\Registration::where('event_id', $id)->get()->count();
      return view('event' ,['event' => $event, 'attendence' => $attendence, 'count' => $count]);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
