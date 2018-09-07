<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProfileController extends Controller
{
        
    public function update($id) {
        $profile = User::find($id);
        
      }
    }
}
