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
        'profileImage' => 'image|mimes:jpeg,png,jpg,gif',
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
            'profileImage' => 'required|image|mimes:jpeg,png,jpg,gif', // Adjust the validation rules as needed
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
    

    public function deleteProfileImage(Request $request) {
        // Assuming you store user profile image information in a table named 'users'
        $user = Auth::user(); // Get the authenticated user
        
        // Delete the image file from storage (you might have a different way of managing storage)
        Storage::delete($user->profile_image); // Assuming the image path is stored in 'profile_image' field
        
        // Clear the profile_image field in the database
        $user->profile_image = null;
        $user->save();
        
        return response()->json(['success' => true]);
    }

    public function saveCroppedImage(Request $request)
    {
        try {
            if ($request->hasFile('croppedImage')) {
                $image = $request->file('croppedImage');
                $filename = 'profile_' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('profile_images', $filename, 'public'); // Assuming 'public' is your disk name

                // Update the user's profile image field in the database
                $user = auth()->user(); // Assuming you're using authentication
                $user->profile_image = $filename;
                $user->save();

                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'No image provided.']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while saving the image.']);
        }
    }
}

