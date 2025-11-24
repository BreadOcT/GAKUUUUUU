<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm() { return view('auth.login'); }

    public function showAdminLoginForm()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate(['email' => 'required', 'password' => 'required']);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors(['email' => 'Login gagal.']);
    }

    public function adminLogin(Request $request)
    {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // cek role
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard'); // ke dashboard
        } else {
             Auth::logout();
            return back()->with('error', 'Hanya admin yang bisa login.');
        }
    }
    return back()->with('error', 'Email atau password salah.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login.form');
    }

    
}
