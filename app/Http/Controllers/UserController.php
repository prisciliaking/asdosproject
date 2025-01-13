<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // Add this line to use Auth
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //login-register view
    public function showLoginRegisterForm()
    {
        return view('login-register');
    }

    //view mahasiswa
    public function viewUsers()
    {
        $users = User::where('role_id', 1)->with('role')->get();
        return view('view-users', compact('users'));
    }

    //view admin
    public function viewAdmins()
    {
        $users = User::where('role_id', 2)->with('role')->get();
        return view('view-admins', compact('users'));
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
