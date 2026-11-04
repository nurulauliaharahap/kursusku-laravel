<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $siteName }} - Belajar Online</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f0fdf4;
            color: #263b2d;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: linear-gradient(90deg, #14532d, #15803d);
            padding: 15px 0;
            box-shadow: 0 3px 12px rgba(0,0,0,0.12);
        }

        .navbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            text-decoration: none;
            font-size: 23px;
            font-weight: bold;
        }

        .logo {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 50%;
        }

        .navbar nav {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 18px;
        }

        .navbar nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar nav a:hover {
            color: #bbf7d0;
        }

        .navbar nav .nav-button {
            background: white;
            color: #166534;
            padding: 10px 15px;
            border-radius: 8px;
        }

        .navbar nav .nav-button:hover {
            background: #dcfce7;
            color: #14532d;
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
            border-radius: 20px;
            padding: 45px;
            margin-top: 35px;
        }

        .hero-content {
            flex: 1;
        }

        .hero-label {
            color: #15803d;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .hero h1 {
            color: #14532d;
            font-size: 38px;
            line-height: 1.25;
        }

        .hero-content p {
            line-height: 1.7;
        }

        .hero-image img {
            width: 230px;
            max-width: 100%;
            border-radius: 20px;
        }

        .register-button,
        .add-course-button,
        .manage-button {
            display: inline-block;
            padding: 12px 20px;
            margin-top: 12px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.2s;
        }

        .register-button {
            background: #15803d;
            color: white;
        }

        .register-button:hover {
            background: #14532d;
            color: white;
        }

        .add-course-button {
            background: white;
            color: #166534;
            border: 2px solid #15803d;
            margin-left: 8px;
        }

        .add-course-button:hover {
            background: #dcfce7;
            color: #14532d;
        }

        .manage-button {
            background: #166534;
            color: white;
        }

        .manage-button:hover {
            background: #14532d;
            color: white;
        }

        #katalog {
            padding: 45px 0;
        }

        #katalog h2 {
            color: #166534;
            font-size: 29px;
        }

        .section-description {
            color: #64748b;
            margin-bottom: 25px;
        }

        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 22px;
        }

        .card {
            background: white;
            border: 1px solid #bbf7d0;
            border-radius: 15px;
            padding: 23px;
            box-shadow: 0 5px 15px rgba(22, 101, 52, 0.07);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .course-code {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .card h3 {
            color: #14532d;
            margin-top: 15px;
        }

        .card p {
            line-height: 1.6;
        }

        .course-availability {
            background: #f0fdf4;
            padding: 10px;
            border-radius: 8px;
        }

        .availability-count {
            color: #15803d;
        }

        .footer {
            background: #14532d;
            color: white;
            text-align: center;
            padding: 22px;
            margin-top: 30px;
        }

        @media (max-width: 700px) {
            .navbar-content {
                flex-direction: column;
            }

            .navbar nav {
                justify-content: center;
            }

            .hero {
                flex-direction: column;
                padding: 25px;
                text-align: center;
            }

            .hero h1 {
                font-size: 28px;
            }

            .hero-image img {
                width: 180px;
            }

            .add-course-button {
                margin-left: 0;
            }
        }
    </style>
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
                <a href="{{ route('courses.index') }}">Kelola Kursus</a>

                <a href="{{ route('courses.create') }}" class="nav-button">
                    + Tambah Kursus
                </a>
            </nav>

        </div>
    </header>

    <main class="container">

        <section class="hero">

            <div class="hero-content">

                <p class="hero-label">
                    BELAJAR WEB SECARA BERTAHAP
                </p>

                <h1>
                    Bangun Kemampuan Web dari PHP sampai Laravel
                </h1>

                <p>
                    KursusKu menyediakan latihan terarah bagi pemula
                    yang ingin belajar pemrograman web secara bertahap.
                    Tingkatkan kemampuan dan raih keterampilan baru
                    bersama KursusKu.
                </p>

                <a href="{{ route('daftar') }}" class="register-button">
                    Mulai Belajar
                </a>

                <a href="{{ route('courses.create') }}" class="add-course-button">
                    + Tambah Kursus
                </a>

                <a href="{{ route('courses.index') }}" class="manage-button">
                    Kelola Kursus
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