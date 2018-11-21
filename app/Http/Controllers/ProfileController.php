<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Schools;
use App\Student;
use Auth;
use File;
use \Input as Input;

class ProfileController extends Controller
{
    /**
     * Function to get all the user data and checking if this is the user bound to the profile.
     */
    public function getProfile($id) {
        if (auth::user()->id == $id){
            $user = Auth::user();
            $profile = User::find($id);
            $schools = Schools::all();

            $student = Student::where('user_id', $id)->first();
            $selectedSchool = null;
            if ($student) {
                $selectedSchool = $student->school()->get();
            }
            return view('profile.profile', ['profile' => $profile, 'user' => $user, 'schools' => $schools, 'selectedSchool' => $selectedSchool]);
        }
        elseif (Auth::user()->role_id == 2){
            $user = Auth::user();
            $profile = User::find($id);
            // $schools = Schools::all();
            // $student = Student::where('user_id', $id)->first();
            // $selectedSchool = null;
            // if ( $student = Student::where('user_id', $id)->first()) {
            //         $selectedSchool = $student->school()->get();
            // }
            return view('profile.profile', ['profile' => $profile, 'user' => $user]);
        }
        return redirect()->back()->with('error', 'Dat is niet jouw profiel!');
    }

    /**
     * Function checks if these textfields are filled in.
     */
    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:25',
            'email' => 'required|email|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',
            'address' => 'required|between:1,30|regex:^[a-zA-Z\d.\s]+$^',
            'telephone' => 'required|regex:/^[0-9]{3}-[0-9]{4}-[0-9]{3}$/',
            'role_id' => 'nullable'
        ]);
        /**
         * This gets replaces the old data with the data that is requested.
         */
        if (Auth::user()->role_id == 2){
            $user = User::find($request->input('id'));
        }else{
            $user = Auth::user();
        }
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->telephone = $request->input('telephone');
            $user->role_id = $request->input('role_id');

            $user->save();
            return redirect()->back()->with('message', __('msg.ProfileController.edit'));
    }

    /**
     * Function uploads the image to the database.
     */
    public function upload(Request $request){
        if(Input::hasFile('image'))
        {
            $request->validate([
                'image' => 'dimensions:max_width=500,max_height=500'
            ]);

            $user = Auth::user();
            $file     = Input::file('image');
            $fileExt   = $file->getClientOriginalExtension();
            $fileRename = time().'_'.uniqid().'.'.$fileExt;
            $uploadDir    = public_path('uploads');
            /**
             * makes a timestamp for the image name, so it won't replace another image with the same name
             */
            $currentImage = $uploadDir.'/'.$user->image;
            if (File::exists($currentImage)) {
                File::delete($currentImage);
            }
            $file->move($uploadDir, $fileRename);
            $user->image = $fileRename;
        }
        else {
            return redirect()->back();
            }
        /**
         * saves the image name to the database.
         */
        $user->save();
        return redirect()->back();
    }

    /**
     * This function sets the user inactive
     */
    public function ban($id){
        $user = User::find($id);
        $user->active = 0;
        $user->save();

        return redirect()->back();
    }
    /**
     * This function sets the user active
     */
    public function unban($id){
        $user = User::find($id);
        $user->active = 1;
        $user->save();

        return redirect()->back();
    }
}
