<?php

namespace App\Http\Controllers;

use Auth;
use Excel;
use \App\User;
use \App\Event;
use App\Exports\ParticipantsExport;
use Maatwebsite\Excel\Exporter;

class ExportController extends Controller
{
    /**
     * Export the provided $id into an excel sheet.
     * event_$eventId_participants.xlsx
     */
    function export($id)
    {
    	if(Auth::user() && Event::where(array('id' => $id))->exists()) {
            $event = Event::find($id);
    		if (Auth::id() == $event->user_id ||  Auth::user()->role_id == 2) {
				return Excel::download(new ParticipantsExport($id), 'event_'.$id.'_participants.xlsx');
    		} else {
				return abort(403);
    		}
    	} else {
			return abort(404);
    	}
    }
}
