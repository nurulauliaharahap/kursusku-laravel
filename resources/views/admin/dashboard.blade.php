@extends('layouts.app')

@section('title', 'Dashboard Administrator')

@section('content')

<style>
    .admin-page {
        background: #f4f5f7;
        min-height: 100vh;
        padding: 25px;
        color: #20252b;
    }

    .admin-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .admin-heading h2 {
        font-size: 25px;
        font-weight: 700;
        margin: 0;
    }

    .admin-welcome {
        color: #777;
        font-size: 13px;
        margin-top: 7px;
    }

    .admin-profile {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .admin-profile strong {
        font-size: 13px;
    }

    .btn-logout {
        border: 1px solid #ddd;
        background: white;
        color: #dc2348;
        padding: 9px 17px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 13px;
    }

    .btn-logout:hover {
        background: #fff0f3;
        color: #c51c3e;
    }

    .admin-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
        margin-bottom: 25px;
    }

    .stat-card {
        background: white;
        border: 1px solid #eee;
        border-radius: 12px;
        padding: 23px;
        box-shadow: 0 3px 12px rgba(0,0,0,.03);
        transition: .2s;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 16px rgba(0,0,0,.07);
    }

    .stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .stat-title {
        color: #777;
        font-size: 12px;
        font-weight: bold;
    }

    .stat-icon {
        width: 42px;
        height: 42px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        font-size: 18px;
    }

    .icon-course {
        background: #e4efff;
        color: #3478db;
    }

    .icon-participant {
        background: #d9f7e9;
        color: #159b70;
    }

    .icon-enrollment {
        background: #ffe3e8;
        color: #dc2348;
    }

    .stat-number {
        font-size: 32px;
        font-weight: bold;
        color: #20252b;
        margin-bottom: 5px;
    }

    .stat-description {
        color: #999;
        font-size: 12px;
        margin: 0;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 20px;
    }

    .dashboard-panel {
        background: white;
        border: 1px solid #eee;
        border-radius: 12px;
        padding: 22px;
        min-width: 0;
    }

    .panel-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        gap: 10px;
    }

    .panel-heading h5 {
        font-size: 17px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .panel-heading p {
        font-size: 12px;
        color: #999;
        margin: 0;
    }

    .btn-manage {
        background: #ed123c;
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 8px;
        font-size: 12px;
        white-space: nowrap;
    }

    .btn-manage:hover {
        background: #c90c31;
        color: white;
    }

    .quick-menu {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 16px 0;
        border-bottom: 1px solid #eee;
        text-decoration: none;
        color: #333;
    }

    .quick-menu:last-child {
        border-bottom: none;
    }

    .quick-icon {
        width: 40px;
        height: 40px;
        background: #f1f3f5;
        border-radius: 9px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #dc2348;
    }

    .quick-menu strong {
        font-size: 13px;
        display: block;
        margin-bottom: 4px;
    }

    .quick-menu small {
        color: #999;
        font-size: 11px;
    }

    .quick-menu:hover {
        color: #dc2348;
    }

    .admin-footer {
        margin-top: 25px;
        text-align: center;
        color: #999;
        font-size: 12px;
    }

    @media(max-width: 900px) {
        .admin-stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width: 576px) {
        .admin-page {
            padding: 15px;
        }

        .admin-stats {
            grid-template-columns: 1fr;
        }

        .admin-heading h2 {
            font-size: 20px;
        }

        .stat-card {
            padding: 18px;
        }

        .panel-heading {
            flex-wrap: wrap;
        }
    }
</style>

<div class="admin-page">

    <!-- HEADER DASHBOARD -->
    <div class="admin-heading">

        <div>
            <h2>Admin Dashboard</h2>

            <p class="admin-welcome">
                Selamat datang kembali,
                {{ auth()->user()->name }}.
                Kelola sistem KursusKu melalui dashboard ini.
            </p>
        </div>

        <div class="admin-profile">

            <div>
                <strong>ADMIN</strong>
                <span class="text-muted">
                    {{ auth()->user()->name }}
                </span>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="btn-logout">
                    Logout
                </button>
            </form>

        </div>

    </div>


    <!-- STATISTIK DASHBOARD -->
    <div class="admin-stats">

        <!-- TOTAL KURSUS -->
        <div class="stat-card">

            <div class="stat-top">
                <span class="stat-title">TOTAL KURSUS</span>

                <div class="stat-icon icon-course">
                    <i class="fa-solid fa-book"></i>
                </div>
            </div>

            <div class="stat-number">
                {{ $totalCourses ?? 0 }}
            </div>

            <p class="stat-description">
                Seluruh kursus yang tersedia
            </p>

        </div>


        <!-- TOTAL PESERTA -->
        <div class="stat-card">

            <div class="stat-top">
                <span class="stat-title">TOTAL PESERTA</span>

                <div class="stat-icon icon-participant">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>

            <div class="stat-number">
                {{ $totalParticipants ?? 0 }}
            </div>

            <p class="stat-description">
                Seluruh peserta terdaftar
            </p>

        </div>


        <!-- TOTAL ENROLLMENT -->
        <div class="stat-card">

            <div class="stat-top">
                <span class="stat-title">TOTAL PENDAFTARAN</span>

                <div class="stat-icon icon-enrollment">
                    <i class="fa-solid fa-file-circle-check"></i>
                </div>
            </div>

            <div class="stat-number">
                {{ $totalEnrollments ?? 0 }}
            </div>

            <p class="stat-description">
                Seluruh data pendaftaran kursus
            </p>

        </div>

    </div>


    <!-- BAGIAN DASHBOARD -->
    <div class="dashboard-grid">

        <!-- PANEL INFORMASI -->
        <div class="dashboard-panel">

            <div class="panel-heading">

                <div>
                    <h5>Selamat Datang di KursusKu</h5>

                    <p>
                        Sistem informasi pengelolaan kursus online.
                    </p>
                </div>

                <a href="{{ route('home') }}" class="btn-manage">
                    Lihat Situs Publik
                </a>

            </div>

            <div style="padding: 15px 0;">

                <h5 style="font-size:16px; font-weight:bold;">
                    Dashboard Administrator
                </h5>

                <p style="font-size:13px; color:#777; line-height:1.8;">
                    Melalui halaman administrator ini, kamu dapat
                    mengelola data kursus, peserta, serta pendaftaran
                    kursus yang terdapat pada sistem KursusKu.
                </p>

                <div style="
                    background:#fff1f3;
                    border-left:4px solid #ed123c;
                    padding:15px;
                    border-radius:7px;
                    margin-top:20px;
                ">

                    <strong style="font-size:13px;">
                        Informasi Administrator
                    </strong>

                    <p style="font-size:12px; color:#777; margin:7px 0 0;">
                        Gunakan menu yang tersedia untuk mengelola
                        data sistem secara terstruktur dan mudah.
                    </p>

                </div>

            </div>

        </div>


        <!-- PANEL MENU CEPAT -->
        <div class="dashboard-panel">

            <div class="panel-heading">

                <div>
                    <h5>Menu Administrasi</h5>

                    <p>
                        Akses fitur pengelolaan sistem.
                    </p>
                </div>

            </div>


            <a href="{{ route('courses.index') }}"
               class="quick-menu">

                <div class="quick-icon">
                    <i class="fa-solid fa-book"></i>
                </div>

                <div>
                    <strong>Kelola Kursus</strong>
                    <small>Tambah dan kelola data kursus</small>
                </div>

            </a>


            <a href="{{ route('enrollments.index') }}"
               class="quick-menu">

                <div class="quick-icon">
                    <i class="fa-solid fa-users"></i>
                </div>

                <div>
                    <strong>Laporan Enrollment</strong>
                    <small>Lihat data pendaftaran peserta</small>
                </div>

            </a>


            <a href="{{ route('profile') }}"
               class="quick-menu">

                <div class="quick-icon">
                    <i class="fa-solid fa-user-gear"></i>
                </div>

                <div>
                    <strong>Edit Profil</strong>
                    <small>Kelola informasi akun administrator</small>
                </div>

            </a>


            <a href="{{ route('home') }}"
               class="quick-menu">

                <div class="quick-icon">
                    <i class="fa-solid fa-house"></i>
                </div>

                <div>
                    <strong>Situs Publik</strong>
                    <small>Kembali ke halaman utama KursusKu</small>
                </div>

            </a>

        </div>

    </div>


    <!-- FOOTER -->
    <div class="admin-footer">
        © {{ date('Y') }} KursusKu. All Rights Reserved.
    </div>

</div>

@endsection