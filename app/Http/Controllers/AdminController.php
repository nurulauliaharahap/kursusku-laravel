<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Participant;
use App\Models\Enrollment;

class AdminController extends Controller
{
    public function dashboard()
    {
        // ======================================
        // MEMERIKSA AKSES ADMINISTRATOR
        // ======================================

        $role = strtolower(auth()->user()->role ?? '');

        abort_unless(
            in_array($role, ['admin', 'administrator']),
            403,
            'Anda tidak memiliki akses sebagai administrator.'
        );


        // ======================================
        // STATISTIK PENGGUNA
        // ======================================

        $totalUsers = User::count();

        $activeUsers = User::whereIn(
            \Illuminate\Support\Facades\DB::raw('LOWER(status)'),
            ['aktif', 'active']
        )->count();

        $inactiveUsers = $totalUsers - $activeUsers;

        $totalAdmins = User::whereIn(
            \Illuminate\Support\Facades\DB::raw('LOWER(role)'),
            ['admin', 'administrator']
        )->count();


        // ======================================
        // STATISTIK KURSUS
        // ======================================

        $totalCourses = Course::count();


        // ======================================
        // STATISTIK PESERTA
        // ======================================

        $totalParticipants = Participant::count();


        // ======================================
        // STATISTIK ENROLLMENT
        // ======================================

        $totalEnrollments = Enrollment::count();


        // ======================================
        // LIMA PENGGUNA TERBARU
        // ======================================

        $recentUsers = User::latest()
            ->take(5)
            ->get();


        // ======================================
        // LIMA AKTIVITAS LOGIN TERBARU
        // ======================================

        $recentLogins = User::whereNotNull('last_login_at')
            ->orderByDesc('last_login_at')
            ->take(5)
            ->get();


        // ======================================
        // MENAMPILKAN DASHBOARD
        // ======================================

        return view('admin.dashboard', compact(

            'totalUsers',
            'activeUsers',
            'inactiveUsers',
            'totalAdmins',

            'totalCourses',
            'totalParticipants',
            'totalEnrollments',

            'recentUsers',
            'recentLogins'

        ));
    }
}