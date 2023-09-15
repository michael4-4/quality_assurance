<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function declaration goes here
    public function home(){
        return view('home');
    }
    /*
    public function index(Request $request)
{
    // Check if there is a success message in the session
    $successMessage = $request->session()->get('success');

    // Check if the user is authenticated
    if (auth()->check()) {
        $user = auth()->user();

        // Retrieve all documents from the database
        $documents = Document::all();

        // Return the home view and pass the success message, user, and documents to the view
        return view('home', [
            'successMessage' => $successMessage,
            'user' => $user,
            'documents' => $documents,
        ]);
    }

    // User is not authenticated, return the home view with only the success message
    return view('home', ['successMessage' => $successMessage]);
}
*/

    public function index()
    {
         // Retrieve all documents from the database along with the uploader's information
        $documents = Document::with('uploader')->get();

        // Return the home view and pass the documents to the view
        return view('home', [
            'documents' => $documents,
        ]);
    }

    public function index1()
    {
        $documents = Document::all(); // Fetch all documents from the database

        return view('home', [
            'documents' => $documents,
            'successMessage' => session('success'), // Retrieve the success message from the session
        ]);
    }

}