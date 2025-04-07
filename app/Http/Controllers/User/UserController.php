<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return view('user.update-data');
    }

    function doUpdateData(Request $request) {
        $request->validate([
            'name' => 'required|string|max:128|min:3',
            'password' => 'nullable|string|max:128|min:3|confirmed',
            'password-confirmation' => 'required_with:password|same:password',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 128 karakter',
            'password.min' => 'Password minimal 3 karakter',
            'password.max' => 'Password maksimal 128 karakter',
            'password-confirmation.same' => 'Konfirmasi password tidak sama'
        ]);

        $data = [
            'name' => $request->input('name'),
            'password' => $request->input('password')? bcrypt($request->input('password')) : Auth::user()->password,
        ];

        User::where('id', Auth::user()->id)->update($data);
        return redirect()->route('user.update')->with('success', 'Data user berhasil diupdate');
    }

    function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }
}
