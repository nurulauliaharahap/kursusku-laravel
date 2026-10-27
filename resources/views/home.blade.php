
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $siteName }} - Belajar Online</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Navigasi -->
    <header class="navbar">
        <div class="container navbar-content">

            <a href="{{ route('home') }}" class="brand">
                <img
                    src="{{ asset('img/logo.jpg') }}"
                    alt="Logo KursusKu"
                    class="logo"
                >
                <span>{{ $siteName }}</span>
            </a>

            <nav>
                <a href="{{ route('home') }}">Beranda</a>
                <a href="#katalog">Katalog</a>
                <a href="/daftar">Daftar Kursus</a>
            </nav>

        </div>
    </header>

    <main class="container">

        <!-- Bagian utama -->
        <section class="hero">

            <div class="hero-content">
                <p class="hero-label">
                    Belajar Web Secara Bertahap
                </p>

                <h1>
                    Bangun Kemampuan Web dari PHP sampai Laravel
                </h1>

                <p>
                    KursusKu menyediakan latihan terarah bagi pemula
                    yang ingin belajar pemrograman web secara bertahap.
                </p>

                <a href="/daftar" class="register-button">
                    Mulai Belajar
                </a>
            </div>

            <div class="hero-image">
                <img
                    src="{{ asset('img/logo.jpg') }}"
                    alt="Logo KursusKu"
                >
            </div>

        </section>

        <!-- Katalog kursus -->
        <section id="katalog">

            <h2>Kursus Pilihan</h2>

            <p class="section-description">
                Pilih kursus yang ingin kamu pelajari.
            </p>

            <div class="course-grid">

                @foreach ($featured as $course)
                    <article class="card">

                        <span class="course-code">
                            {{ $course['code'] }}
                        </span>

                        <h3>{{ $course['name'] }}</h3>

                        <p>{{ $course['description'] }}</p>

                        <a href="/daftar" class="register-button">
                            Daftar Sekarang
                        </a>

                    </article>
                @endforeach

            </div>

        </section>

    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            &copy; {{ date('Y') }} {{ $siteName }}.
            Semua hak dilindungi.
        </div>
    </footer>

</body>
</html>