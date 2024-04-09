<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    // display the welcome page
    public function home()
    {
        return view('welcome');
    }

    // display the signup page
    public function signup()
    {
        return view('signup');
    }

    // Store the user details
    public function store()
    {
        // validate the user details
        request()->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:60', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 50 characters.',
            'email.required' => 'The email field is required.',
            'email.string' => 'The email must be a string.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 60 characters.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.'
        ]);

        // Retrieve the user details
        $name = request('name');
        $email = request('email');
        $password = request('password');

        // store the user details
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        // redirect to the login page
        return redirect()->route('user.login');
    }

    // display the login page
    public function login()
    {
        return view('login');
    }

    // authenticate the user
    public function authenticate()
    {
        // validate the user details
        request()->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ], [
            'email.required' => 'The email field is required.',
            'email.string' => 'The email must be a string.',
            'email.email' => 'The email must be a valid email address.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.'
        ]);

        // Retrieve the user details
        $id = User::where('email', request('email'))->first()->id;
        $email = request('email');
        $password = request('password');

        // authenticate the user
        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            // redirect to the user dashboard

            return redirect()->route('user.index', ['userId' => $id])->with(['success' => 'You have successfully logged in.']);
        }

        // redirect to the login page
        return redirect()->route('user.login')->withErrors(['error' => 'Invalid email or password.']);
    }
}
