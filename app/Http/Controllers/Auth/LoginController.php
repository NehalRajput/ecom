<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //this method is for showing loginform
    public function showLoginForm()
    {
        return view('auth.login');
    }
//this method is for login form
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->passes())
        {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {
                return redirect('/')->with('success', 'Login successful!');
            }
            else{
                return redirect()->route('login')->withInput()->withErrors(['email' => 'Invalid Credentials']);
            }
        }
        else{
            return redirect()->route('login')->withInput()->withErrors($validator);
        }
    }

    //this method is for register form
    public function showRegistrationForm()
    {
     
        return view('auth.register');
    }

    //this method is for process register form
    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        if($validator->passes())
        {
           
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = 'customer'; // Assuming 'customer' is the default role, change as needed
            $user->save();
            return redirect()->route('login')->with('success', 'Registration successful. Please login.');

        }
        else{
            return redirect()->route('register')->withInput()->withErrors($validator);
        }


    }

     public function logout()
     {
        Auth::logout();
        return redirect('/')->with('success', 'Logged out successfully!');
     }
    
}