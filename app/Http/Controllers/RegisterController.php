<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
     {
       $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:7|max:255'

         ]);

       $user = User::create($attributes);

       auth()->login($user);

       return redirect('/')->with('success','Your account has been created.');
    }


    public function destroy()
    {
            auth()->logout();
            return redirect('/')->with('success','Goodbye!');
    }
}
