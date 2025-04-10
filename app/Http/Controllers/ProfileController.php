<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function dashboard(User $user){
        return view('profile.dashboard',[
            "user"=>$user
        ]);
    }
    public function create(){
        return view('books.library');
    }
}
