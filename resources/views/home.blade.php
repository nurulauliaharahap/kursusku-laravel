<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $siteName }} - Belajar Online</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

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
                <a href="{{ route('daftar') }}">Daftar Kursus</a>
            </nav>
        </div>
    </header>

    <main class="container">

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

                <a href="{{ route('daftar') }}" class="register-button">
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

                        <p class="course-availability">
                            <span class="availability-label">
                                Kursi tersedia:
                            </span>

                            <strong
                                class="availability-count"
                                id="kursi-{{ $course['code'] }}"
                                data-course-code="{{ $course['code'] }}"
                            >
                                Memuat...
                            </strong>
                        </p>

                        <a
                            href="{{ route('daftar') }}"
                            class="register-button"
                        >
                            Daftar Sekarang
                        </a>

                    </article>
                @endforeach
            </div>
        </section>

    </main>

    <footer class="footer">
        <div class="container">
            &copy; {{ date('Y') }} {{ $siteName }}.
            Semua hak dilindungi.
        </div>
    </footer>

    <script>
        // Menghubungkan kode kursus dengan ID pada route availability.
        const courseIds = {
            'WEB-01': 1,
            'PHP-01': 2,
            'LAR-01': 3
        };

        document.querySelectorAll('.availability-count').forEach(element => {
            const code = element.dataset.courseCode;
            const id = courseIds[code];

            if (!id) {
                element.textContent = 'Belum tersedia';
                return;
            }

            fetch(`/courses/${id}/availability`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal memuat kursi');
                    }

                    return response.json();
                })
                .then(data => {
                    element.textContent = data.remaining + ' kursi';
                })
                .catch(() => {
                    element.textContent = 'Tidak dapat dimuat';
                });
        });
    </script>

</body>
</html>