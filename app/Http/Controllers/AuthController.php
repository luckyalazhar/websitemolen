<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('login',[
        "title" => "Sign In"
        ]);
    }
    public function register(){
        return view('register',[
        "title" => "Sign Up"
        ]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required','min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3|max:255'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        
        toastr('Account Successfully Registrated');
        return redirect('/login');
    }   
}
