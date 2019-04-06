<?php

/*
|--------------------------------------------------------------------------
| StAuth10065: I Dylan Hernandez, 000307857 certify that this material is my original work. 
| No other person's work has been used without due acknowledgement. 
| I have not made my work available to anyone else.
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AboutController extends Controller
{
    public function showHome()
    {
        return view('home');
    }

    public function showAbout()
    {
        return view('about');
    }
}
