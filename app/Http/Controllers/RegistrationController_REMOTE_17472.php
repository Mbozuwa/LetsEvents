<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Email;
use Mail;
use App\Mail\Registered;
use Auth;
use App\Event;

class RegistrationController extends Controller
{
    /**
     * Function to set the status to "ik ga"
     *and it sends a registration email
     */

    public function userGoing($id) {
    	  $user = Auth::user();
    	  $registration = new Registration([
          'user_id' => $user['id'],
          'event_id' => $id,
          'status' => "Ik ga",
        ]);

        $registration->save();
        $event = \App\event::find($id);
        try {
            Mail::to($user->email)->send(new Registered($event, $user));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'nope');
        }

        session(['notificationAlarmDelete' => false]);
        session(['notification' => 'Je gaat naar het evenement: '.$event['name']]);
        session(['event_id' => $id]);
        return redirect('/event/'.$id);
    }
    /**
     * Function to set the status to "misschien"
     */
    public function userMaybe($id) {
    	$user = Auth::user();
    	$registration = new Registration([
        'user_id' => $user['id'],
        'event_id' => $id,
        'status' => "Misschien",
        ]);

        $registration->save();
        $event = \App\event::find($id);
        session(['notificationAlarmDelete' => false]);
        session(['notification' => 'Je gaat misschien naar het evenement: '.$event['name']]);
        session(['event_id' => $id]);
        return redirect('/event/'.$id);
    }
    /**
     * Function to set the status to "ik ga niet"
     */
    public function userNotGoing($id) {
    	$user = Auth::user();
    	$registration = new Registration([
        'user_id' => $user['id'],
        'event_id' => $id,
        'status' => "Ik ga niet",
        ]);

        $registration->save();
        $event = \App\event::find($id);
        session(['notificationAlarmDelete' => false]);
        session(['notification' => 'Je gaat niet naar het evenement: '.$event['name']]);
        session(['event_id' => $id]);
        return redirect('/event/'.$id);
    }

}
