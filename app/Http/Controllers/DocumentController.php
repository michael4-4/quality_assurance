<?php

// app/Http/Controllers/DocumentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function uploadForm()
    {
        return view('upload_form');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'programcourse' => 'required|string',
            'typeofvisit' => 'required|string',
            'dateofvisit' => 'required|string',
            'award' => 'required|string',
            'validityperiod' => 'required|string',
            'grandmean' => 'required|numeric',
            'document' => 'required|mimes:pdf',
        ]);

        // Get the original filename of the uploaded document
        $originalFilename = $request->file('document')->getClientOriginalName();

        // Upload the document and store it in the "public/documents" directory
        $documentPath = $request->file('document')->storeAs('documents', $originalFilename, 'public');

        // Store the document details in the database
        Document::create([
            'program_course' => $request->programcourse,
            'type_of_visit' => $request->typeofvisit,
            'date_of_visit' => $request->dateofvisit,
            'award' => $request->award,
            'validity_period' => $request->validityperiod,
            'grand_mean' => $request->grandmean,
            'document_path' => $originalFilename, // Store the actual filename in the database
        ]);

        // Redirect back to /home with a success message
        return redirect('/home')->with('success', 'Document uploaded successfully.');
    }
}
