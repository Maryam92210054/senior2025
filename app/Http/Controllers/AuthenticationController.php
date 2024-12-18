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
  
    public function login() {
        return view('login');
    }

   
    public function registration() {
      
        $goals = Goal::all(); 
        $restrictions = Restriction::all();

       
        return view('registration', compact('goals', 'restrictions'));
    }

    
    public function loginPost(Request $request) {
       
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

     
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
           
            $user = Auth::user();

           
            if ($user->role_id == 1) {
             
                return redirect()->route('viewMeals');
            } else {
            
                return redirect()->route('meals.index');
            }
        } else {
          
            return back()->with('fail', 'Invalid email or password.');
        }
    }


    public function registrationPost(Request $request) {
      
        $request->validate([
            'name' => ['required', 'regex:/^[A-Za-z]+(?:\s[A-Za-z]+)+$/'],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
            'address' => 'required',
            'phone' => ['required', 'regex:/^\d{2}\/\d{6}$/'],
            'goal_id' => 'required|exists:goals,id',
            
        ], [
            'name.regex' => 'Please provide your full name',  // Custom error message for the "name" field
        ]);


        

       

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); 
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role_id = 1; 
        $user->goal_id = $request->goal_id;
        $user->restriction_id = $request->restriction_id;

       
        if ($user->save()) {
            
            return redirect('/login')->with('success', 'Registration successful! Please log in.');
        } else {
            
            return back()->with('fail', 'Something went wrong. Please try again.');
        }
    }
    public function destroy(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); 
    }
}
