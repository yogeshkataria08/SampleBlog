<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Register
    /**
     * Handle user registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request){ 
        // Handle both GET and POST requests

        if($request->isMethod("post")){

            $request->validate([
                "name" => "required|string",
                "email" => "required|email|unique:users",
                "phone" => "required",
                "password" => "required"
            ]);

            User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "phone" => $request->phone
            ]);

            // Redirect to dashboard after successful registration
            if(Auth::attempt([
                "email" => $request->email,
                "password" => $request->password
            ])){

                return to_route('home');
            }else{

                return to_route('register');
            }

        }

        return view("auth.register");
    }

    // Login
    /**
     * Handle user login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        // Handle both GET and POST requests
      
        if($request->isMethod("post")){

            $request->validate([
                "email" => "required|email",
                "password" => "required"
            ]);

            if(Auth::attempt([
                "email" => $request->email,
                "password" => $request->password
            ])){

                return to_route("home");
            }else{

                return to_route("login")->with("error", "Invalid login details");
            }
        }
        return view("auth.login"); 
    }

    // Dashboard
    /**
     * Display the dashboard after login.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(){
        // Accessible after login
        return view("dashboard");
    }

    // Profile
    /**
     * Handle user profile update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request){
        // Accessible after login
      
        if($request->isMethod("post")){

            $request->validate([
                "name" => "required|string",
                "phone" => "required"
            ]);

            $id = auth()->user()->id; // Get logged in user ID

            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->save();

            return to_route("profile")->with("success", "Profile updated successfully");
        }

        return view("profile");
    }

    // Logout
    /**
     * Handle user logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(){
        // Accessible after login
        Session::flush();

        Auth::logout();

        return to_route("login")->with("success", "Logged out successfully");
    }
}
