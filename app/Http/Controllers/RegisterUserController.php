<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
       
        if(whitespace($request->get('firstname'))){
            return back()->withErrors([
                'firstname'=>'Can not be blank',
            ]);
        }

        else if(whitespace($request->get('lastname'))){
            return back()->withErrors([
                'lastname'=>'Can not be blank'
            ]);
        }

        $request->validate([
            'firstname'=>['required'],
            'lastname'=>['required'],
            'email'=>['required','email','max:255','unique:users'],
            'password'=>['required',Password::min(8)->letters()->numbers(),'confirmed']
        ]);

        $user = User::create([
            'firstName'=>$request->get('firstname'),
            'lastName'=>$request->get('lastname'),
            'bio'=> 'I am new',
            'rank'=> 'Novice',
            'email'=>$request->get('email'),
            'password'=> Hash::make($request->get('password'))
        ]);


        return redirect()->route('login');
    }
}
