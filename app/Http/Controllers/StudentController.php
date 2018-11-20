<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Schools;
use App\User;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

         // public function showStudent($id) {
         //     $student = User::find($id);
         //
         //     return view('student.show')->with('user', $user);
         // }
         // public function test() {
         //     $test =User::find($id);
         //     return view('layouts.navbar')->with('test', $test);
         // }
         /*
         *Gets all the students and returns the student index page
         */
    public function index()
    /**
     * Retrieve all studens, users and schools.
     * Return view with all variables
     */
    {
        $students = Student::all();
        $users = User::all();
        $schools = Schools::all();
         // $user = $student->id;
        return view('student/index', ['students' => $students, 'users' => $users, 'schools' => $schools]);
    }
    public function show()
    /**
     * Find the student with the corresponding user_id.
     * Find all schools.
     * Return view with students and schools
     */
    {
        $user = Auth::user();
        $student = Student::find(['user_id' => $user->id]);
        $schools = Schools::all();
        return view('student/show', ['student' => $student, 'schools' => $schools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Chooseschool(Request $request, $id)
    /**
     * Create a new student with the selected school and user_id
     * redirect back
     */
    {   
        $delete = Student::where('user_id', $id)->delete();
        $student = new Student;
        $student->school_id = $request->input('school');
        $student->user_id = Auth::user()->id;
        $student->save();
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        // dd($request->input('school'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
