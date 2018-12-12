<?php

namespace App\Http\Controllers;

use Auth;
use \App\Event;
use \App\User;

use Excel;
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
    	if(Auth::user())
    	{
    		if(Event::where(array('id' => $id))->exists())
    		{
		        $event = Event::find($id);
	    		if (Auth::id() == $event->user_id ||  Auth::user()->role_id == 2)
	    		{
					return Excel::download(new ParticipantsExport($id), 'event_'.$id.'_participants.xlsx');
	    		}
	    		else
	    		{	// User niet event creator of admin
					return abort(403);
	    		}
    		}
    		else
    		{	// Event bestaat niet
    			return abort(404);
    		}
    	}
    	else
    	{	// User is niet ingelogd, stuurt door .
			return abort(404);
    	}
    }
}
