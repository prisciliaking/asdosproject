<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // Add this line to use Auth
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function viewUsers()
    {
        $users = User::with('role')->get();
        return view('view-users', compact('users'));
    }

    public function showLoginRegisterForm()
    {
        return view('login');
    }

    //login
    public function login(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'user_email' => 'required|email',
            'user_nim' => 'required|string',
        ]);

        // Attempt to find the user by email and NIM
        $user = User::where('user_email', $request->user_email)
            ->where('user_nim', $request->user_nim)
            ->first();

        if (!$user) {
            // Return an error message if user is not found
            return redirect()->back()->with('error', 'Email or NIM Incorrect!');
        }

        //simpen name e user
        session(['user_name' => $user->user_name]);

        // Redirect to the home page after successful login
        return redirect()->route('home')->with('message', 'Login successful!');
    }

    public function logout(Request $request)
    {
        // Clear user session data
        $request->session()->forget('user_name');

        // Redirect to login page
        return redirect()->route('login')->with('message', 'You have been logged out.');
    }

    public function showRegistrationForm()
    {
        return view('register');
    }
    //register
    public function register(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'user_name' => 'required|string|max:255,user_name',
            'user_email' => 'required|email|unique:users,user_email',
            'user_nim' => 'required|string|unique:users,user_nim',

        ]);

        // Create and save the new user
        User::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_nim' => $request->user_nim,
            'role_id' => 1 //mahasiswa
        ]);

        // Redirect with a success message
        return redirect()->route('login')->with('message', 'Registration successful! Please log in.');
    }
}
