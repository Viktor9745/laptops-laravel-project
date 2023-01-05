<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function login(Request $request){
        if(Auth::check()){
            return redirect()->intended('/laptops');
        }

        $validated = $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        if(Auth::attempt($validated)){
            if(Auth::user()->role->name=="admin"){
                return redirect()->intended('/adm/users');
            }else if(Auth::user()->role->name=="moderator"){
                return redirect()->intended('/adm/categories');
            }
            return redirect()->intended('/laptops');
        }
        return back()->withErrors('Incorrect email or password');
    }



    public function logout(){
        Auth::logout();
        return redirect()->route('login.form');
    }
}
