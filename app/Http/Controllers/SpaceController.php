<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpaceController extends Controller
{
    // display the user dashboard
    public function index()
    {
        return view('Spaces.index');
    }

    // display the form to create a new space
    public function create($userId)
    {
        return view('Spaces.create');
    }
}
