<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;


// ==========================================
// ROUTE LOGIN
// ==========================================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');


// ==========================================
// ROUTE HALAMAN UTAMA
// ==========================================

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


// ==========================================
// ROUTE PENDAFTARAN
// ==========================================

Route::get('/daftar', function () {
    return view('daftar');
})->name('daftar');

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
// ROUTE LUPA PASSWORD
// ==========================================

Route::get('/lupa-password', function () {
    return view('auth.forgot-password');
})->name('password.request');


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
// ROUTE KELOLA KURSUS
// ==========================================

Route::resource('courses', CourseController::class);


// ==========================================
// ROUTE KHUSUS PENGGUNA YANG SUDAH LOGIN
// ==========================================

Route::middleware('auth')->group(function () {

    // ======================================
    // DASHBOARD ADMINISTRATOR
    // ======================================

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');


    // ======================================
    // ROUTE ENROLLMENT
    // ======================================

    Route::get('/enrollments', [EnrollmentController::class, 'index'])
        ->name('enrollments.index');

    Route::get('/enrollments/create', [EnrollmentController::class, 'create'])
        ->name('enrollments.create');

    Route::post('/enrollments', [EnrollmentController::class, 'store'])
        ->name('enrollments.store');


    // ======================================
    // ROUTE PROFIL PENGGUNA
    // ======================================

    // Halaman Profil Saya
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile');

    // Memperbarui identitas dan kontak
    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    // Mengganti password
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password');


    // ======================================
    // ROUTE LOGOUT
    // ======================================

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});