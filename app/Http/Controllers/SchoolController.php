<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schools;
use App\Student;

use Auth;
class SchoolController extends Controller
{
    /*
    *This function gets all schools and returns them.
    *Checks if the user is an admin with role id 2, if not you get redirected to te home page.
    *$schools gets all the data from the schools model.
    *then $schools gets returned to the index view of school.
    */
    public function index() {
            if (Auth::user()->role_id != 2) {
            return redirect('/');
        }
        $schools = Schools::all();
        // $students = Students::all();
        // $students->userStudent;
        return view('/school/index')->with('schools', $schools);
    }
    /*
    *This function returns the edit view.
    *This function get's the id through the route which gets the id from the url.
    *Checks if the user is an admin with role id 2, if not you get redirected to te home page.
    *Then It finds a specific school using an id.
    *the next if checks if what has been put in school isn't null, if it is then you get redirected to the page before.
    *If the check is passed then it returns to the edit view with $school.
    */
    public function edit($id) {
        if (Auth::user()->role_id != 2) {
            return redirect('/');
        }

        $school = Schools::find($id);
        if ($school == null) {
            return redirect()->back();
        }
        return view('school/edit', ['school' => $school]);
    }
    /*
    *This fucntion updates a school
    * @param
    * @return
    * This function expects two things: a request and an id.
    *Checks if the user is an admin with role id 2, if not you get redirected to te home page.
    *With the request validate it checks if 3 inputs are filled in, because the are required.
    *Then it finds teh school it wants to edit by searching for a specific id.
    *after that id has been found it puts everything from the request form into $school.
    *Then it saves the updated school at $school->save().
    *then you get returned to the schools index.
    */

    public function update(Request $request, $id) {
        if (Auth::user()->role_id != 2) {
            return redirect('/');
        }
        
        $request->validate([
            'schoolname' => 'required|max:40',
            'place' => 'required|between:1,30|regex:^[a-zA-Z\d.\s]+$^'  ,
            'address' => 'required|between:1,30|regex:^[a-zA-Z\d.\s]+$^'
        ]);
        $school = Schools::find($id);
        $school->name =   $request->input('schoolname');
        $school->place =   $request->input('place');
        $school->address =   $request->input('address');
        $school->save();
        return redirect('/school/index')->with('message', __('msg.SchoolController.info.edit.success'));
    }
    /*
    *This function deletes a school.
    *This function expects an id.
    *Checks if the user is an admin with role id 2, if not you get redirected to te home page.
    *Then it finds the school by using the id that is expected.
    *If the id does not exist it returns the user to the former page.
    *If the does exist it deletes that id (school) and returns to the schools index.
    */
    public function delete($id) {
        if (Auth::user()->role_id != 2) {
            return redirect('/');
        }
        $school = Schools::find($id);
        if ($school == null) {
            return redirect()->back();
        }

        Student::where('school_id', $id)->delete();
        $school->delete();
        return redirect('/school/index')->with('message', __('msg.SchoolController.info.delete.success'));
    }
    /*
    *This function returns the create form.
    *Checks if the user is an admin with role id 2, if not you get redirected to te home page.
    */
    public function create() {
        if (Auth::user()->role_id != 2) {
            return redirect('/');
        }
        return view('/school/create');
    }
    /*
    *This function makes a new school.
    *This function expects a request from the create form.
    *Then it validates if the required inputs are filled in.
    *If they are filled in creates a new instance of the school class with: $school = new Schools;
    *Then it puts all the data from the form in the variable.
    *Then it saves a new school in the database and returns back to the schools index.
    */
    public function store(Request $request) {
        if (Auth::user()->role_id != 2) {
            return redirect('/');
        }
        $request->validate([
            'schoolname' => 'required|max:40',
            'place' => 'required|between:1,30|regex:^[a-zA-Z\d.\s]+$^',
            'address' => 'required|between:1,30|regex:^[a-zA-Z\d.\s]+$^'
        ]);
        $school = new Schools;
        $school->name =   $request->input('schoolname');
        $school->place =   $request->input('place');
        $school->address =   $request->input('address');
        $school->save();
        return redirect('/school/index')->with('message',  __('msg.SchoolController.info.create.success'));

    }
}
