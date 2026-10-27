<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/daftar', function () {
    return view('daftar');
})->name('daftar');

Route::post('/daftar', function (
    \Illuminate\Http\Request $request
) {
    $validated = $request->validate([
        'nama' => 'required|string|max:100',
        'email' => 'required|email|max:255',
        'kursus' => 'required|in:WEB-01,PHP-01,LAR-01',
    ]);

    return view('hasil-daftar', [
        'pendaftaran' => $validated,
    ]);
})->name('daftar.proses');