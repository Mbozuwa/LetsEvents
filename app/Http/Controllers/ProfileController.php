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
        if (auth::user()->id == $id){
            $user = Auth::user();
            $profile = User::find($id);
            return view('profile.profile', ['profile' => $profile, 'user' => $user]);
        }
        elseif (Auth::user()->role_id == 2){
            $user = Auth::user();
            $profile = User::find($id);
            return view('profile.profile', ['profile' => $profile, 'user' => $user]);
        }

        return redirect()->back()->with('error', 'Dat is niet jouw profiel!'); 
    }

    //Functions checks if these textfields are filled in.
    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'role_id' => 'nullable'
        ]);
        if (Auth::user()->role_id == 2){
        $user = User::find($request->input('id'));

    //This gets replaces the old data with the data that is requested.
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->telephone = $request->input('telephone');
        $user->role_id = $request->input('role_id');
        
        $user->save();

        return redirect()->back()->with('message', 'Profiel succesvol bewerkt!');
        }
        else{
        $user = Auth::user();

    //This gets replaces the old data with the data that is requested.
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->telephone = $request->input('telephone');
        
        $user->save();

        return redirect()->back()->with('message', 'Profiel succesvol bewerkt!');
        }
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
    public function ban($id){

        $user = User::find($id);

        $user->active = 0;
        
        $user->save();

        return redirect()->back();
    } 
    public function unban($id){

        $user = User::find($id);

        $user->active = 1;
        
        $user->save();

        return redirect()->back();
    }
}