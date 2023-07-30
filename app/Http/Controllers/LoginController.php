<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    //allow a new user to join existing org by using the joinOrgView route and calling on the blade file
    public function joinOrgView() {
        return view('app.existingOrg');
    }

    public function login() {
        if (session('user_id')) {
            return redirect()->route('home');
        }
        return view('app.login_temporary');
    }

    public function authenticate(Request $request) {
        // Check if the user is already logged in
        if (session('user_id')) {
            return redirect()->route('home');
        }

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
    
        // Get the user by the provided username
        $user = User::where('username', $request->username)->first();
    
        if ($user) {
            // User exists, check if the password is correct
            if (password_verify($request->password, $user->password)) {
                // Password is correct, set the user_id in the session and redirect to the home page
                Session::put('user_id', $user->id);
                return redirect('home');
            } else {
                // Password is incorrect, display error message
                return back()->with('error', 'Incorrect password');
            }
        } else {
            // User does not exist, display error message
            return back()->with('error', 'No user found');
        }
    }

    public function createAccountView() {
        if (session('user_id')) {
            return redirect()->route('home');
        }
        return view('app.create_account');
    }

    public function authenticateNewAccount(Request $request){
        
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'password_confirm' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string'
        ]);
        
        $username = User::where('username', $request->username)->first();

        if ($username) {
            // Username Taken
            return redirect()->back()->with('error', 'Username already taken');
        } elseif ($request->password != $request->password_confirm) {
            // Passwords do not match
            return redirect()->back()->with('error', 'Passwords do not match');
        }else {
            // Create the user
            $password = password_hash($request->password, PASSWORD_DEFAULT);

            User::create([
                'username' => $request->username,
                'password' => $password,
                'email' => $request->email,
                'phone' => $request->phone_number
            ]);

            // Redirect with success message
            return redirect('/login')->with('success', 'Account created successfully! You can now log in.');
        }
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
