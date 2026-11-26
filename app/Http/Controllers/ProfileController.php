<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    // ==========================================
    // MENAMPILKAN HALAMAN PROFIL
    // ==========================================

    public function index()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }


    // ==========================================
    // MENYIMPAN PERUBAHAN PROFIL
    // ==========================================

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi data profil
        $validated = $request->validate([
            'name' => 'required|string|max:100',

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'phone' => 'nullable|string|max:20',
            'position' => 'nullable|string|max:100',
            'institution' => 'nullable|string|max:150',
            'address' => 'nullable|string|max:1000',
        ]);

        // Memperbarui data pengguna
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'] ?? null;
        $user->position = $validated['position'] ?? null;
        $user->institution = $validated['institution'] ?? null;
        $user->address = $validated['address'] ?? null;

        $user->save();

        return redirect()->route('profile')
            ->with('success', 'Profil berhasil diperbarui!');
    }


    // ==========================================
    // MENGGANTI PASSWORD
    // ==========================================

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Validasi password
        $validated = $request->validate([
            'current_password' => 'required|string',

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'password.min' => 'Password baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sama.',
        ]);

        // Memeriksa password lama
        if (!Hash::check(
            $validated['current_password'],
            $user->password
        )) {
            return back()->withErrors([
                'current_password' => 'Password saat ini tidak sesuai.',
            ]);
        }

        // Menyimpan password baru
        // Model User menggunakan cast password => hashed
        $user->password = $validated['password'];
        $user->save();

        return redirect()->route('profile')
            ->with('success', 'Password berhasil diganti!');
    }
}