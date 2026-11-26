<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">

        {{-- LOGO KURSUSKU --}}
        <a class="navbar-brand d-flex align-items-center"
           href="{{ route('home') }}">

            <img src="{{ asset('img/logo.jpg') }}"
                 alt="Logo KursusKu"
                 style="width:48px; height:48px; object-fit:contain;
                        border-radius:50%; margin-right:12px;">

            <span>KursusKu</span>
        </a>


        {{-- TOMBOL MENU MOBILE --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>


        {{-- MENU NAVBAR --}}
        <div class="collapse navbar-collapse" id="mainNavbar">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                {{-- BERANDA --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>


                {{-- KATALOG --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#katalog">
                        Katalog
                    </a>
                </li>


                {{-- DAFTAR KURSUS --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('daftar') }}">
                        Daftar Kursus
                    </a>
                </li>


                {{-- KELOLA KURSUS --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.index') }}">
                        Kelola Kursus
                    </a>
                </li>


                {{-- TAMBAH KURSUS --}}
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                    <a class="btn btn-light text-success fw-bold px-4"
                       href="{{ route('courses.create') }}">
                        + Tambah Kursus
                    </a>
                </li>


                {{-- MENU JIKA SUDAH LOGIN --}}
                @auth

                    {{-- DASHBOARD --}}
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            Dashboard
                        </a>
                    </li>


                    {{-- PROFIL SAYA --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">
                            Profil Saya
                        </a>
                    </li>
                    


                    {{-- TOMBOL LOGOUT --}}
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit"
                                    class="btn btn-danger fw-bold px-4"
                                    onclick="return confirm('Apakah Anda yakin ingin keluar dari akun KursusKu?')">

                                Logout

                            </button>
                        </form>

                    </li>

                @else

                    {{-- TOMBOL LOGIN JIKA BELUM LOGIN --}}
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">

                        <a class="btn btn-success border border-light fw-bold px-4"
                           href="{{ route('login') }}">

                            Login

                        </a>

                    </li>

                @endauth

            </ul>
        </div>
    </div>
</nav>


{{-- RESPONSIVE NAVBAR --}}
<style>
    .navbar {
        background: linear-gradient(90deg, #14532d, #198754);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.12);
        padding: 12px 0;
    }

    .navbar-brand {
        font-size: 25px;
        font-weight: bold;
        color: white !important;
    }

    .navbar .nav-link {
        color: white !important;
        font-weight: 600;
        margin-left: 10px;
        transition: 0.2s;
    }

    .navbar .nav-link:hover {
        color: #d1fae5 !important;
    }

    .navbar .btn {
        border-radius: 9px;
        padding: 10px 18px;
    }

    .navbar .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .navbar .btn-danger:hover {
        background-color: #bb2d3b;
    }

    @media (max-width: 991px) {
        .navbar .nav-link {
            margin-left: 0;
            padding: 10px 0;
        }

        .navbar .nav-item {
            margin-left: 0 !important;
        }

        .navbar .nav-item form {
            margin: 8px 0;
        }
    }
</style>