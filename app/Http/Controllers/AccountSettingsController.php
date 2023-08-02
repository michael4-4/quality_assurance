<?php 

// app/Http/Controllers/AccountSettingsController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountSettingsController extends Controller
{
    public function index()
    {
        return view('account_settings');
    }

    public function update(Request $request)
    {
        // Validate the form data
        $request->validate([
            'department' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed', // Make 'password' field nullable
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update the user's account settings
        $user->update([
            'department' => $request->input('department'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // Include the password only if it is not empty
            'password' => $request->filled('password') ? Hash::make($request->input('password')) : $user->password,
        ]);
        
        // Update the password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
            $user->save();
        }
        
        session()->flash('success', 'Successfully Update Credentials!');

        return redirect()->route('account_settings')->with('success', 'Account settings updated successfully!');
    }
}
