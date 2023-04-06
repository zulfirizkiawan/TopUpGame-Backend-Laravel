<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index(Request $request)
    {

        return view('auth.login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/dashboard');
    //     }

    //     // return back()->withErrors([
    //     //     'email' => 'The provided credentials do not match our records.',
    //     // ]);
    //     return redirect()->back()->withErrors(['email' => 'Email atau password salah.'])->withInput($request->only('email'));
    // }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            if (Auth::user()->roles == 'ADMIN') {
                return redirect()->intended('dashboard');
            } else {
                // Jika user bukan admin, tambahkan error message ke session
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Anda tidak memiliki hak akses.']);
            }
        }

        // Jika login gagal, tambahkan error message ke session
        return redirect()->back()->withErrors(['email' => 'Email atau password salah.'])->withInput($request->only('email'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
