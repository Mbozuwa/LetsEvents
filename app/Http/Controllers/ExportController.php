<?php 

namespace App\Http\Controllers;

use Excel;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Exporter;

class ExportController extends Controller
{
	public function export($id)
	{
	    $exporter = app()->makeWith(UsersExport::class, compact('id'));   
	    return $exporter->download('participants_event.xlsx');
	}
    
    /*function export($id)
    {
    	//$registered = Registration::where(['event_id' => $id])->where('status' , "Ik ga")->get();
        return Excel::download(new UsersExport(), 'participants_event.xlsx');
    }*/
}