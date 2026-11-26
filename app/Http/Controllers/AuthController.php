<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.login');
    }

    // Memproses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $field = filter_var(
            $credentials['login'],
            FILTER_VALIDATE_EMAIL
        ) ? 'email' : 'username';

        $remember = $request->boolean('remember');

        if (Auth::attempt([
            $field => $credentials['login'],
            'password' => $credentials['password'],
        ], $remember)) {

            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Berhasil login! Selamat datang di KursusKu.');
        }

        return back()
            ->withErrors([
                'login' => 'Username/email atau password salah.',
            ])
            ->onlyInput('login');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Setelah logout langsung menuju halaman login
        return redirect()->route('login')
            ->with('success', 'Anda berhasil keluar dari akun KursusKu.');
    }
}