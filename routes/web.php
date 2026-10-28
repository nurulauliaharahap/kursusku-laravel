<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

// Route halaman utama
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Route formulir pendaftaran
Route::get('/daftar', function () {
    return view('daftar');
})->name('daftar');

// Route proses pendaftaran
Route::post('/daftar', function (Request $request) {
    $validated = $request->validate([
        'nama' => 'required|string|max:100',
        'email' => 'required|email|max:255',
        'kursus' => 'required|in:WEB-01,PHP-01,LAR-01',
    ]);

    return view('hasil-daftar', [
        'pendaftaran' => $validated,
    ]);
})->name('daftar.proses');

Route::get('/courses/{course}/availability', function (int $course) {
    $availability = [
        1 => [
            'course' => 'Web Dasar',
            'remaining' => 12,
        ],
        2 => [
            'course' => 'PHP Dasar',
            'remaining' => 8,
        ],
        3 => [
            'course' => 'Laravel Dasar',
            'remaining' => 4,
        ],
    ];

    abort_unless(isset($availability[$course]), 404);

    return response()->json($availability[$course]);
})->name('courses.availability');
