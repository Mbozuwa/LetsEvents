<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use JavaScript;
use App\School;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function testSearch() {

        return view('test/dropdownSearchTest');
    }
    public function json() {
        $schoolArray = [];
        $schools = School::get();
        foreach ($schools as $school) {
            array_push($schoolArray,$school['name']);
        }
        // dd($schoolArray);
        return response()->json($schoolArray);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     /**
     * Save user data in a variable
     * Check if the user has an active profile (if not redirect to logout)
     * Else return home
     */
    {
            $user = Auth::user();
            if ($user->active == 0) {
            return redirect('/logout')->with('error', 'Uw profiel is niet actief. Neem contact op met de systeembeheerder.');
        }
        return view('welcome');
    }
    public function notificationDelete()
    /**
     * Deletes the notification currently saved in the session
     * Redirect back
     */
    {
        session()->forget('notification');
        return redirect()->back();
    }
    /**
     * Deletes the notification "!" currently saved in the session
     * Redirect back
     */
    public function notificationAlarmDelete()
    {
        session(['notificationAlarmDelete' => true]);
        return redirect()->back();
    }
}
