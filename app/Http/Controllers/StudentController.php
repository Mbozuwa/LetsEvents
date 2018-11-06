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
    {
        $students = Student::all();
        $users = User::all();
        $schools = Schools::all();
         // $user = $student->id;
        return view('student/index', ['students' => $students, 'users' => $users, 'schools' => $schools]);
    }
    public function show()
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
    public function Chooseschool(Request $request)
    {
        $student = new Student;
        // dd($request->input('school'));
        $student->school_id = $request->input('school');

        $student->user_id = Auth::user()->id;
        $student->save();
        return redirect()->back();
    }
    public function edit($id) {
        $student = Student::where('user_id', $id)->get();
        $user = Auth::user();
        // $studentSchool = Student::find('user_id', $user->id);
        //
        // dd($student->school_id);
        $schools = Schools::all();
        return view('/student/edit', ['student' => $student]);
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
    public function update(Request $request, $id)
    {
        //
    }

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
