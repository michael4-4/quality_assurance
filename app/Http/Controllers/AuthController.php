<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; //hashing password
use Illuminate\Support\Facades\Auth; // for authentication

class AuthController extends Controller
{
    // shows the Registration form
    public function register () {
        return view('register');
    }

    // process of Registration
    public function registerPost(Request $request) {
        
        $user = new User();

        $user->department = $request->department;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        // return back();
        //return redirect()->route('login')->with('success', 'Successfully Registered ');
        
        // Set a success flash message
        session()->flash('success', 'Successfully Registered! Please login with your credentials.');

        // Redirect the user to the login page
        return redirect()->route('login');
    }

    // shows the Login form
    public function login(){
        return view('login');
    }

    // process of Login
    public function loginPost(Request $request) {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/home')->with('success', 'Successfully Login');
        }

        return back()->with('error', 'Incorrect Email or Password');
    }

    // process of Logout
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}