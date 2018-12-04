<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Event;
class MailController extends Controller
{
//     public function sendmail(){
//        $user = Auth::user();
//        \Mail::to($user)->send(new Event);
//        return response();
// }
    public function sendEmailReminder() {
        $user = Auth::user();
        $events = Event::all();
        Mail::send('emailTemplates/registered', ['user' => $user, 'events' => $events], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
        return view('/welcome');
    }
    // public function send(Request $reqeust) {
    //    //  $title = $request->input('title');
    //    // $content = $request->input('content');
    //
    //    \Mail::send('emailTemplates.registered',[],  function ($message)
    //    {
    //
    //        $message->from('me@gmail.com', 'Christian Nwamba');
    //
    //        $message->to('chrisn@scotch.io');
    //
    //    });
    //
    //
    //    return response()->json(['message' => 'Request completed']);
    // }
}
