<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'KursusKu - Belajar Online')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* PENGATURAN DASAR */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background-color: #f3f8f4;
            color: #263b2d;
            font-family: Arial, sans-serif;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(90deg, #14532d, #198754);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.12);
        }

        .navbar-brand {
            font-size: 23px;
            font-weight: bold;
        }

        .navbar .nav-link {
            color: white !important;
            margin-left: 12px;
            transition: 0.2s;
        }

        .navbar .nav-link:hover {
            color: #d1fae5 !important;
        }

        /* TOMBOL HIJAU */
        .btn-green {
            background-color: #198754;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            transition: 0.2s;
        }

        .btn-green:hover {
            background-color: #146c43;
            color: white;
        }

        /* TOMBOL KELUAR */
        .btn-logout {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            margin-left: 12px;
            transition: 0.2s;
        }

        .btn-logout:hover {
            background-color: #bb2d3b;
            color: white;
        }

        /* KONTEN */
        .container {
            max-width: 1140px;
        }

        main {
            min-height: 75vh;
        }

        /* NOTIFIKASI BERHASIL */
        .alert-success {
            border-radius: 8px;
            border: 1px solid #a3cfbb;
            background-color: #d1e7dd;
            color: #0f5132;
            padding: 15px 20px;
        }

        /* NOTIFIKASI ERROR */
        .alert-danger {
            border-radius: 8px;
            padding: 15px 20px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .navbar .nav-link {
                margin-left: 0;
                padding: 10px 0;
            }

            .btn-logout {
                margin: 10px 0;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- NAVBAR --}}
    @include('partials.navbar')

    {{-- KONTEN HALAMAN --}}
    <main class="container py-4">

        {{-- PESAN ERROR --}}
        @if (session('error'))
            <div class="alert alert-danger mb-4">
                <strong>Gagal!</strong>
                {{ session('error') }}
            </div>
        @endif

        {{-- PESAN VALIDASI --}}
        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <strong>Terjadi kesalahan:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ISI HALAMAN --}}
        @yield('content')

    </main>

    @stack('scripts')

</body>
</html>