<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;


// ==========================================
// ROUTE HALAMAN UTAMA
// ==========================================

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


// ==========================================
// ROUTE FORMULIR PENDAFTARAN
// ==========================================

Route::get('/daftar', function () {
    return view('daftar');
})->name('daftar');


// ==========================================
// ROUTE PROSES PENDAFTARAN
// ==========================================

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


// ==========================================
// ROUTE KETERSEDIAAN KURSUS
// ==========================================

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


// ==========================================
// ROUTE CRUD KURSUS
// ==========================================

Route::resource('courses', CourseController::class);


// ==========================================
// ROUTE ENROLLMENT
// ==========================================

// Menampilkan laporan enrollment
Route::get('/enrollments', [EnrollmentController::class, 'index'])
    ->name('enrollments.index');

// Menampilkan form tambah enrollment
Route::get('/enrollments/create', [EnrollmentController::class, 'create'])
    ->name('enrollments.create');

// Menyimpan data enrollment
Route::post('/enrollments', [EnrollmentController::class, 'store'])
    ->name('enrollments.store');