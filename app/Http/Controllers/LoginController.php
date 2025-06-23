<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

        public function store(LoginRequest $request)
    {
       $checkLogin = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

       if(!$checkLogin)
        {
            return to_route('login.index')->with('error','Email or password is wrong');
        }

        
        return to_route('product.index');
    }


    
    public function logout()
    {
        auth()->logout();

        return to_route('login.index');
    }
}
