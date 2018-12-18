<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\School;
use App\Student;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('schools.index', ['schools' => School::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'schoolname' => 'required|max:40',
            'place' => 'required|between:1,30|regex:^[a-zA-Z\d.\s]+$^',
            'address' => 'required|between:1,30|regex:^[a-zA-Z\d.\s]+$^'
        ]);

        if ($validator->fails()) {
            return redirect('schools/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $school = new School();
            $school->name = $request->input('schoolname');
            $school->place = $request->input('place');
            $school->address = $request->input('address');
            $school->save();
        }
        return redirect('schools')->with('success', __('msg.SchoolController.info.create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('schools.edit', ['school' => $school]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $validator = Validator::make($request->all(), [
            'schoolname' => 'required|max:40',
            'place' => 'required|between:1,30|regex:^[a-zA-Z\d.\s]+$^'  ,
            'address' => 'required|between:1,30|regex:^[a-zA-Z\d.\s]+$^'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->action('SchoolController@edit', ['id' => $school->id])
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $school->name = $request->input('schoolname');
            $school->place = $request->input('place');
            $school->address = $request->input('address');
            $school->save();
        }
        return redirect('schools')->with('success', __('msg.SchoolController.info.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $school->delete();
        Student::where('school_id', $school->id)->delete();
        return redirect('schools')->with('success', __('msg.SchoolController.info.delete.success'));
    }
}
