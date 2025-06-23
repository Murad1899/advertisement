<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('register');
    }

    public function store(RegisterRequest $request) 
    {
        User::query()
        ->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password


        ]);

        return redirect()->route('register.index');
    }
}
