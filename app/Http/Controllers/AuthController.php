<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; //hashing password
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; // for authentication
use App\Models\Role;
use App\Models\Department; // Import the Department model

class AuthController extends Controller
{
    public function showRegistrationForm()
{
    // Fetch all roles from the 'roles' table
    $roles = Role::all();

    // Fetch all the roles from the 'department' table
    $departments = Department::all();

    // Pass the $roles variable to the view
    return view('register', compact('roles', 'departments'));
}

    // shows the Registration form
    public function register () {
        return view('register');
    }

    // process of Registration
    public function registerPost(Request $request) {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'role' => 'required|in:admin,secondary',
            'department' => 'required',
            'college' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255|unique:users',
            'firstname' => 'required|string|max:255|unique:users',
            'middlename' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
      
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
        
        $user->role = $request->role;
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
        session()->flash('alert', 'Successfully Registered! Please login with your credentials.');

        // Redirect the user to the login page
        return redirect()->route('login');
    }

    // shows the Login form
    public function login(){
        return view('login');
    }

    // process of Login
    public function loginPost(Request $request) {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // Check if the "Remember Me" checkbox is checked
    
        if (Auth::attempt($credentials, $remember)) {
            // Store the email in the session if "Remember Me" was checked
            if ($remember) {
                session(['remember_email' => $request->input('email')]);
            } else {
                session()->forget('remember_email');
            }
    
            return redirect('/home')->with('alert', 'You have Successfully Logged In!');
        }
    
        // If login fails, return to the login form with inputs
        return back()
<<<<<<< HEAD
            ->with('alert2', 'Incorrect Email or Password, Try Again!')
            ->withInput($request->only('password'));
           // ->withInput($request->except('password')); // Exclude password input from being repopulated
    }
    
=======
            ->with('error', 'Incorrect Email or Password')
            ->withInput($request->except('password')); // Exclude password input from being repopulated
    }
    


>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1

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