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
            'department' => 'required',
            'college' => 'nullable', // Make the college input field field optional
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'email' => 'required|email',
            'current_password' => 'required',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the provided current password is correct
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect('/account_settings')->with('alert-danger', 'Current password is incorrect. Please Try Again');
        }

        // Update user account information
        $user->department = $request->input('department');
        $user->college = $request->input('college');
        $user->lastname = $request->input('lastname');
        $user->firstname = $request->input('firstname');
        $user->middlename = $request->input('middlename');
        $user->email = $request->input('email');

        // Save the updated user data
        $user->save();

        return redirect('/account_settings')->with('alert', 'Account information updated successfully.');
    }

    public function changePassword(Request $request)
{
    // Validate the incoming request data (currentPassword, newPassword)
    $request->validate([
        'currentPassword' => 'required',
        'newPassword' => 'required|min:8', // You can add more validation rules as needed
    ]);

    // Get the currently authenticated user
    $user = auth()->user();

    // Check if the current password provided matches the user's current password
    if (!Hash::check($request->input('currentPassword'), $user->password)) {
        return response()->json(['message' => 'Current password is incorrect.'], 422);
    }

    // Update the user's password with the new one
    $user->password = Hash::make($request->input('newPassword'));
    $user->save();

    return response()->json(['message' => 'Password changed successfully.']);
}

}