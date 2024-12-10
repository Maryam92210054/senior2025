<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Goal;
use App\Models\Restriction;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    // Display the login page
    public function login() {
        return view('login');
    }

    // Display the registration page with goals and restrictions
    public function registration() {
        // Fetch goals and restrictions from the database
        $goals = Goal::all(); 
        $restrictions = Restriction::all();

        // Pass the data to the registration view
        return view('registration', compact('goals', 'restrictions'));
    }

    // Handle login process using Auth::attempt()
    public function loginPost(Request $request) {
        // Validate the login form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to log in the user using Auth::attempt()
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed: retrieve the authenticated user
            $user = Auth::user();

            // Check the user's role and redirect accordingly
            if ($user->role_id == 1) {
                // Regular user: redirect to the meals view
                return redirect()->route('viewMeals');
            } else {
                // Admin: redirect to the meals management view
                return redirect()->route('meals.index');
            }
        } else {
            // Authentication failed: return back with error
            return back()->with('fail', 'Invalid email or password.');
        }
    }

    // Handle registration process
    public function registrationPost(Request $request) {
        // Validate the registration form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
            'address' => 'required',
            'phone' => ['required', 'regex:/^\d{2}\/\d{6}$/'],
            'goal_id' => 'required|exists:goals,id',
            'restriction_id' => 'exists:restrictions,id',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Hash the password for security
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role_id = 1; // Default role: regular user
        $user->goal_id = $request->goal_id;
        $user->restriction_id = $request->restriction_id;

        // Save the user to the database
        if ($user->save()) {
            // Registration successful: redirect to login with success message
            return redirect('/login')->with('success', 'Registration successful! Please log in.');
        } else {
            // Registration failed: return back with error message
            return back()->with('fail', 'Something went wrong. Please try again.');
        }
    }
}
