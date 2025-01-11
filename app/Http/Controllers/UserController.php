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

    //login
    public function login(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'user_email' => 'required|email',
            'user_password' => 'required|string',
        ]);

        // Attempt to find the user by email and NIM
        $user = User::where('user_email', $request->user_email)
            ->where('user_password', $request->user_password)
            ->with('role')
            ->first();

        if (!$user) {
            // kkalau error
            return redirect()->back()->with('error', 'Email or Password Incorrect!');
        }

        //simpen name, nim, role_id,image e user 
        session([
            'user_name' => $user->user_name,
            'user_password'  => $user->user_password,
            'role_id'   => $user->role->role_id,
            'image' => $user->image,
        ]);

        ///if login success, then will go to home
        return redirect()->route('home')->with('message', 'Login successful!');
    }

    public function logout(Request $request)
    {
        // Clear all user session data
        $request->session()->flush();

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
            'user_name' => 'required|string|max:255',
            'user_nim' => 'required|string|unique:users,user_nim',
            'user_email' => 'required|email|unique:users,user_email',
            'user_password' => 'required|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        //Handle the image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Store the image in 'public/images' directory within storage/app/public
            $imagePath = $request->file('image')->store('images', 'public');
        }
    
        // Create and save the new user
        User::create([
            'user_name' => $request->user_name,
            'user_nim' => $request->user_nim,
            'user_email' => $request->user_email,
            'user_password' => $request->user_password,
            'image' => $imagePath, 
            'role_id' => 1, // mahasiswa
        ]);
    
        // Redirect with a success message
        return redirect()->route('login')->with('message', 'Registration successful! Please log in.');
    }
}
