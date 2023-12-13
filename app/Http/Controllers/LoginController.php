<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi data masukan dari formulir login
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Memeriksa apakah kredensial pengguna benar
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Jika berhasil login
            return redirect()->route('home')->with('success', 'Login successful!');
        } else {
            // Jika login gagal
            return redirect('/login')->with('error', 'Username or password is incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/')->with('success', 'Logged out successfully.');
    }
}
