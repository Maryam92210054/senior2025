<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Goal;
use App\Models\Restriction;
use Hash;

class AuthenticationController extends Controller
{
    function login (){
        return view('login');
    }
    function registration (){
         // Fetch goals and restrictions from the database
         $goals = Goal::all(); 
         $restrictions = Restriction::all();
 
         // Pass the data to the registration view
         return view('registration', compact('goals', 'restrictions'));
    
    }
    function loginPost(Request $request){
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required' 
        ]);
         $user =User::where('email','=',$request->email )->first();
         if($user){
            if (Hash::check($request->password ,$user->password)){
                $request->session()->put('loginId',$user->id);
                if ($user->role_id == 1) {
                    // Role 1: Redirect to viewMeals (for regular users)
                    return redirect()->route('viewMeals');
                } else {
                    // Role 2: Redirect to meals management (for admin)
                    return redirect()->route('meals.index');
                }
                return redirect('/viewMeals');
            }
            else{
                return back()->with('fail','Password does not match'); 
            }
         }
         else{
            return back()->with('fail','This email is not registered');
         }
    }
    public function registrationPost(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:5|max:12',
        'address' => 'required',
        'phone' => ['required', 'regex:/^\d{2}\/\d{6}$/'],
        'goal_id' => 'required|exists:goals,id',
        'restriction_id' => 'exists:restrictions,id',
    ]);

    $user = new User();
    $user['name'] = $request->name;
    $user['email'] = $request->email;
    $user['password'] = Hash::make($request->password);
    $user['address'] = $request->address;
    $user['phone'] = $request->phone;
    $user['role_id'] = 1; // Set the default role to 1
    $user['goal_id'] = $request->goal_id;
    $user['restriction_id'] = $request->restriction_id;
    $res = $user->save();

    if ($res) {
        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    } else {
        return back()->with('fail', 'Something went wrong. Please try again.');
    }
}

}
