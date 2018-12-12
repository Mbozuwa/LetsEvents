<?php

namespace App\Http\Controllers;

use Excel;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Exporter;

class ExportController extends Controller
{
    /**
     * Export the provided $id into an excel sheet.
     * event_$eventId_participants.xlsx
     */
    function export($id)
    {
        return Excel::download(new UsersExport($id), 'event_'.$id.'_participants.xlsx');
    }
}
