<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Goal;
use App\Models\Restriction;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $goals = Goal::all(); 
        $restrictions = Restriction::all();  

        return view('profile.show', [
            'user' => $user,
            'goals' => $goals,
            'restrictions' => $restrictions
        ]);
    }

    public function update(Request $request)
{

    $user = auth()->user();

 
    $validated = $request->validate([
        'name' => ['required', 'regex:/^[A-Za-z]+(?:\s[A-Za-z]+)+$/'],
        'email' => 'required|email|unique:users,email,' . $user->id,  // Avoid email conflict for the current user
        'password' => 'nullable|min:5|max:12',  // Password is optional for update
        'address' => 'required',
        'phone' => ['required', 'regex:/^\d{2}\/\d{6}$/'],  // Validate phone format (e.g., 00/000000)
        'goal_id' => 'required|exists:goals,id',  // Goal ID must exist in the goals table
    ], [
        'name.regex' => 'Please provide your full name',  // Custom error message for the "name" field
    ]);
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->address = $validated['address'];
    $user->phone = $validated['phone'];
    $user->goal_id = $validated['goal_id'];
    $user->restriction_id =$request->restriction_id;

    if ($request->filled('password')) {
        $user->password = bcrypt($validated['password']);
    }
    
    $user->save();

    return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
}


}
