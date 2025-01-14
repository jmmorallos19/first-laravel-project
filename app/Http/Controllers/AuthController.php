<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    
    public function showLogin(){

        return view('auth.login');
    }

    public function showRegister(){
        
        return view('auth.register');
    }


    public function register(Request $request){

        $validated = $request->validate([
            'name' => "required|string|max:50",
            'email' => "required|email|unique:users",
            'password' => "required|string|confirmed|min:3|max:25"
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect(route('members.index'))->with(['message' => "User register successfully!"]);
    }

    
    public function login(Request $request){
        
        $validated = $request->validate([
            'email' => "required|email",
            'password' => "required|string"
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('members.index')->with(['message' => "Login succesfully!"]);
        }

        throw ValidationException::withMessages([
            'credentials' => "Sorry, incorrect credentials!"
        ]);
    }

    
    public function logout(Request $request){
        
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }

}
