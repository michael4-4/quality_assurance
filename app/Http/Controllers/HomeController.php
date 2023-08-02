<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function declaration goes here
    public function home(){
        return view('home');
    }
}