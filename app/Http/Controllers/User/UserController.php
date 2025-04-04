<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    function login() {

        return view ('user.login');
    }

    function doLogin(Request $request) {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('todos')->with('success', 'Login Berhasil');
        }else {
            return redirect()->route('doLogin')->withInput()->withErrors('Email atau Password Salah!');
        }

    }

    function register() {

    }

    function doRegister() {

    }

    function updateData() {

    }

    function doUpdateData() {

    }

    function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }
}
