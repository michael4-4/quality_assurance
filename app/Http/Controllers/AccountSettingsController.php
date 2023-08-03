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
            'college' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'current_password' => 'required_with:password',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update the user's account settings
        $user->update([
            'department' => $request->input('department'),
            'college' => $request->input('college'),
            'lastname' => $request->input('lastname'),
            'firstname' => $request->input('firstname'),
            'middlename' => $request->input('middlename'),
            'email' => $request->input('email'),
        ]);

        // Check if the current password is provided and matches the user's password
        if ($request->has('current_password')) {
            if (Hash::check($request->current_password, $user->password)) {
                // If new password is provided, update the password
                if ($request->filled('password')) {
                    $user->password = Hash::make($request->password);
                }
            } else {
                return back()->with('error', 'Current password is incorrect.');
            }
        }

        // Save the updated user record
        $user->save();

        session()->flash('success', 'Successfully updated account settings!');

        return redirect()->route('account_settings');
    }

}
