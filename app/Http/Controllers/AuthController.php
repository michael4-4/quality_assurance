<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; //hashing password
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; // for authentication

class AuthController extends Controller
{
    // shows the Registration form
    public function register () {
        return view('register');
    }

    // process of Registration
    public function registerPost(Request $request) {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'department' => 'required',
            'college' => 'required|string|max:255',
            'lastname' => 'required|string|max:255|unique:users',
            'firstname' => 'required|string|max:255|unique:users',
            'middlename' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'lastname.unique' => 'The Last name is already taken.',
            'firstname.unique' => 'The First name is already taken.',
            'middlename.unique' => 'The Middle name is already taken.',
            'email.unique' => 'The Email address is already taken.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();

        $user->department = $request->department;
        $user->college = $request->college;
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
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


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('account_settings')->with('success', 'Password updated successfully!');
    }
}