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
      $count = \App\Registration::where('event_id', $id)->get()->count();
      $originalDate = $event['begin_time'];
      $newDate = date("d-m-Y H:i", strtotime($originalDate));
      $originalDateEnd = $event['begin_time'];
      $newDateEnd = date("d-m-Y H:i", strtotime($originalDateEnd));
      session(['notification' => 'Je gaat naar het evenement: '.$event['name']]);
      session(['event_id' => $id]);
      return view('event' ,['event' => $event, 'attendence' => $attendence, 'count' => $count, 'user' =>$user, 'newDate'=> $newDate, 'newDateEnd' => $newDateEnd]);
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
      $count = \App\Registration::where('event_id', $id)->get()->count();
      $originalDate = $event['begin_time'];
      $newDate = date("d-m-Y H:i", strtotime($originalDate));
      $originalDateEnd = $event['begin_time'];
      $newDateEnd = date("d-m-Y H:i", strtotime($originalDateEnd));
      session(['notification' => 'Je gaat misschien naar het evenement: '.$event['name']]);
      session(['event_id' => $id]);
      return view('event' ,['event' => $event, 'attendence' => $attendence, 'count' => $count, 'user' =>$user, 'newDate'=> $newDate, 'newDateEnd' => $newDateEnd]);
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
      $count = \App\Registration::where('event_id', $id)->get()->count();
      $originalDate = $event['begin_time'];
      $newDate = date("d-m-Y H:i", strtotime($originalDate));
      $originalDateEnd = $event['begin_time'];
      $newDateEnd = date("d-m-Y H:i", strtotime($originalDateEnd));
      session(['notification' => 'Je gaat niet naar het evenement: '.$event['name']]);
      session(['event_id' => $id]);
      return view('event' ,['event' => $event, 'attendence' => $attendence, 'count' => $count, 'user' =>$user, 'newDate'=> $newDate, 'newDateEnd' => $newDateEnd]);
    }
}
