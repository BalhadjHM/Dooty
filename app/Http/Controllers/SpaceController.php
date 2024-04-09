<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpaceController extends Controller
{
    // display the user dashboard
    public function index()
    {
        return view('Spaces.index');
    }
}
