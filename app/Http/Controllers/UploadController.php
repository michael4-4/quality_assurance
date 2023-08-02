<?php

// app/Http/Controllers/UploadController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function showUploadPage()
    {
        return view('upload'); // Assuming you have a "upload.blade.php" view file
    }
}