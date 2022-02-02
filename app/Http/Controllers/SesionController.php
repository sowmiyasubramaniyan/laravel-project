<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
class SesionController extends Controller
{
    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        $attributes = request()->validate([

            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes))
        {
            session()->regenerate();
            return redirect('/')->with('success','Welcome Back!');
        }

        throw ValidationException::withMessages([
            'email' => 'your provided credentials could not be verified.'
        ]);
    }
}
