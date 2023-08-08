<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile');
    }

    public function uploadProfileImage(Request $request)
    {
        $user = Auth::user();

        if ($request->hasFile('profileImage')) {
            $imagePath = $request->file('profileImage')->store('profile_images', 'public');

            
            $user->profile_image = $imagePath;
            $user->save();
        }

        return redirect()->route('profile')->with('success', 'Profile image uploaded successfully.');
    }

    public function deleteProfileImage()
{
    $user = Auth::user();

    // Delete the profile image file from storage
    if ($user->profile_image) {
        Storage::disk('public')->delete($user->profile_image);
        $user->profile_image = null;
        $user->save();
    }

    return redirect()->route('profile')->with('success', 'Profile image deleted successfully.');

}

}