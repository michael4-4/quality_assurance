<?php

// app/Http/Controllers/DocumentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use App\Models\ProgramCourse; 


class DocumentController extends Controller
{
    public function showUploadForm() {
        // Fetch all roles from the 'programcourses' table
    $programcourses = ProgramCourse::all();

    // Pass the $roles variable to the view
    return view('upload_form', compact('programcourses'));

    }
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
<<<<<<< HEAD
        'type_of_award' => 'required|string',
=======
        'award' => 'required|string',
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
        'validityperiod' => 'required|string',
        'grandmean' => 'required|numeric',
        'document' => 'required|mimes:pdf',
    ]);

    // Get the currently authenticated user
    $user = auth()->user();

    // Get the original filename of the uploaded document
    $originalFilename = $request->file('document')->getClientOriginalName();

    // Upload the document and store it in the "public/documents" directory
    $documentPath = $request->file('document')->storeAs('documents', $originalFilename, 'public');
<<<<<<< HEAD

    // Store the document details in the database and associate it with the user
    auth()->user()->documents()->create([
        'program_course' => $request->programcourse,
        'type_of_visit' => $request->typeofvisit,
        'date_of_visit' => $request->dateofvisit,
        'type_of_award' => $request->type_of_award,
        'remarks' => $request->remarks,
        'validity_period' => $request->validityperiod,
        'grand_mean' => $request->grandmean,
        'document_path' => $originalFilename,
    ]);

    // Redirect back to /home with a success message
    return redirect('/home')->with('success', 'Document uploaded successfully.');
}

public function filterDocuments(Request $request)
{
    $grandMean = $request->input('grandMean');

    // Fetch documents based on the selected Grand Mean value
    $filteredDocuments = Document::where('grand_mean', $grandMean)->get();

    return response()->json(['documents' => $filteredDocuments]);
}

public function delete(Document $document) {
    try {
        // Delete the document from storage
        Storage::delete('documents/' . $document->document_path);

        // Delete the document record from the database
        $document->delete();

        return response()->json(['message' => 'Document deleted successfully'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'An error occurred while deleting the document'], 500);
    }
=======

    // Store the document details in the database and associate it with the user
    auth()->user()->documents()->create([
        'program_course' => $request->programcourse,
        'type_of_visit' => $request->typeofvisit,
        'date_of_visit' => $request->dateofvisit,
        'award' => $request->award,
        'validity_period' => $request->validityperiod,
        'grand_mean' => $request->grandmean,
        'document_path' => $originalFilename,
    ]);

    // Redirect back to /home with a success message
    return redirect('/home')->with('success', 'Document uploaded successfully.');
}

>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
}

}