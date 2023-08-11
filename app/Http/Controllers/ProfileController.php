<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showProfile()
{
    $user = Auth::user(); // Get the authenticated user
    return view('profile', compact('user'));
}

public function updateProfileImage(Request $request)
{
    $request->validate([
        'profileImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('profileImage')) {
        $user = Auth::user();
        $image = $request->file('profileImage');
        $imagePath = $image->store('profile_images', 'public');

        $user->profile_image = $imagePath;
        $user->save();
    }

    return redirect('/profile')->with('success', 'Profile image updated.');
}

    public function editProfileImage(Request $request)
    {
        // Validate the uploaded image
        $request->validate([
            'profileImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
        ]);

        // Get the current user
        $user = Auth::user();

        // Handle the uploaded image
        if ($request->hasFile('profileImage')) {
            $image = $request->file('profileImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile_images', $imageName); // Store the image in the storage

            // Update the user's profile image path
            $user->profile_image = 'profile_images/' . $imageName;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile image updated successfully.');

        // Handle image editing logic
    
        if ($request->input('deleteProfileImage') === '1') {
            // Delete the profile image and update the database
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile image updated successfully.');
    }
    

    public function deleteProfileImage(Request $request)
    {
        $user = Auth::user();

        // Check if the user confirmed the deletion
        if ($request->input('deleteProfileImage') === '1') {
            // Get the current profile image path
            $currentImagePath = $user->profile_image;

            // Delete the image file from the storage
            if ($currentImagePath) {
                Storage::delete('public/' . $currentImagePath);
            }

            // Update the user's profile image field to null
            $user->profile_image = null;
            $user->save();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Profile image deleted successfully.');
        }

        // Redirect back without any changes
        return redirect()->back();
    }

}