<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create(){
        return inertia('Auth/Login');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // if (auth()->attempt($request->only('email', 'password'))){
        //     return redirect()->route('listing.index');
        // }

        // return back()->with('error', 'Invalid credentials');
        if(!Auth::attempt($request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]), true)){
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect'
            ]);
        }

        $request->session()->regenerate();
        // return redirect()->intended();
        return redirect()->intended('/listing');
    }

    public function destroy(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }   
}
