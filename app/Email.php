<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;
use Auth;
use App\Event;

class Email extends Model
{
    public function sendEmailReminder($id) {
        $user = Auth::user();
        $event = Event::find($id);
        Mail::send('emails.registered', ['user' => $user, 'event' => $event], function ($m) use ($user) {
            $m->from('lets@Event.com', 'Lets event');

            $m->to($user->email, $user->name)->subject(__('msg.reminder'));
        });
        return view('/welcome');
    }
}
