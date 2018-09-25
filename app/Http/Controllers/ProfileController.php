<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use \Input as Input;

class ProfileController extends Controller
{
    //Function to get all the user data.
    public function getProfile($id) {
        $profile = User::find($id);
        $user = Auth::user();
        return view('profile.profile', ['profile' => $profile]);
    }

    //Functions checks if these textfields are filled in.
    public function update(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'telephone' => 'required'
        ]);

        $user = Auth::user();
    //This gets replaces the old data with the data that is requested.
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->telephone = $request->input('telephone');
        
        $user->save();

        return redirect()->back()->with('message', 'Profiel succesvol bewerkt!');
    }

    /**
     * Function uploads the image to the database.
     */
	public function upload(Request $request){

		if(Input::hasFile('image')){

            //check if the image has the following dimensions
            $request->validate([
                'image' => 'dimensions:max_width=500,max_height=500'
           ]);

            $user = Auth::user();

            // image from the request is written to the uploads folder.
            $file = Input::file('image');
            $fileName = $file->getClientOriginalName();
            $location = 'uploads/' . $file->getClientOriginalName();
            $file->move('uploads', $file->getClientOriginalName());
            $user->image = $fileName;
        }
        //saves the image name to the database.
        $user->save();

        return redirect()->back();
    } 
}