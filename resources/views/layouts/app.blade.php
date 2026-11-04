<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'KursusKu')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #f3f8f4;
            color: #263b2d;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: linear-gradient(90deg, #14532d, #198754);
            box-shadow: 0 3px 10px rgba(0,0,0,0.12);
        }

        .navbar-brand {
            font-size: 23px;
            font-weight: bold;
        }

        .navbar .nav-link {
            color: white !important;
            margin-left: 12px;
        }

        .navbar .nav-link:hover {
            color: #d1fae5 !important;
        }

        .btn-green {
            background-color: #198754;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-green:hover {
            background-color: #146c43;
            color: white;
        }

        .container {
            max-width: 1140px;
        }

        .alert-success {
            border-radius: 8px;
        }
    </style>
</head>

<body>
    @include('partials.navbar')

    <main class="container py-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>