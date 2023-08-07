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

    public function index(Request $request)
    {
        // Check if there is a success message in the session
        $successMessage = $request->session()->get('success');

        // Return the home view and pass the success message (if any) to the view
        return view('home', ['successMessage' => $successMessage]);
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