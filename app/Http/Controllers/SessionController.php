<?php

namespace App\Http\Controllers;

use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){

        if(whitespace($request->get('firstname'))){
            return back()->withErrors([
                'firstname'=>'Can not be blank'
            ]);
        }

        $attributes = $request->validate([
            'firstname'=>['required'],
            'email'=>['required','email'],
            'password'=>['required',Password::min(8)->letters()->numbers()]
        ]);

        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email'=>"Sorry, those credentials do not match",
                'password'=>"Sorry, those credentials do not match"
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function destory(){
        Auth::logout();

        return redirect()->route("home");
    }
}
