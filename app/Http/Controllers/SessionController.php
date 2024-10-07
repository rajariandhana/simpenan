<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(){
        $attr = request()->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        // dd("here2");
        if(!Auth::attempt($attr)){
            throw ValidationException::withMessages([
                'email'=>'Sorry, those credentials do not match'
                // 'password'=>'Sorry, those credentials do not match'
            ]);
        }
        // dd("here3");

        request()->session()->regenerate();
        // dd("here");
        return redirect('/');
    }
    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
