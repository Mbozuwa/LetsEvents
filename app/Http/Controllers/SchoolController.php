<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schools;
use Auth;
class SchoolController extends Controller
{
    public function index() {
            if (Auth::user()->role_id != 2) {
            return redirect('/');
        }
        $schools = Schools::all();
        // $students = Students::all();
        // $students->userStudent;
        return view('/school/index', ['schools' => $schools]);
    }
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
    public function update(Request $request, $id) {
        if (Auth::user()->role_id != 2) {
        return redirect('/');
    }
        $request->validate([
            'name' => 'required',
            'place' => 'required',
            'address' => 'required'
        ]);
        $school = Schools::find($id);
        $school->name =   $request->input('name');
        $school->place =   $request->input('place');
        $school->address =   $request->input('address');
        $school->save();
        return redirect('/school/index');
    }
    public function delete($id) {
        if (Auth::user()->role_id != 2) {
        return redirect('/');
    }
        $school = Schools::find($id);
        if ($school == null) {
            return redirect()->back();
        }
        $school->delete();
        return redirect('/school/index');
    }
    public function create() {
        if (Auth::user()->role_id != 2) {
        return redirect('/');
    }
        return view('/school/create');
    }
    public function store(Request $request) {
        if (Auth::user()->role_id != 2) {
        return redirect('/');
    }
        $request->validate([
            'name' => 'required',
            'place' => 'required',
            'address' => 'required'
        ]);
        $school = new Schools;
        $school->name =   $request->input('name');
        $school->place =   $request->input('place');
        $school->address =   $request->input('address');
        $school->save();
        return redirect('/school/index');

    }
}
