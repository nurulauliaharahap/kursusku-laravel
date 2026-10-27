
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus - KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        header {
            background: linear-gradient(135deg, #0f5132, #198754);
            color: white;
            padding: 25px 40px;
        }

        header h1 {
            margin: 0 0 10px;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 18px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            max-width: 760px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .form-card {
            background: white;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #00000012;
        }

        .form-card h2 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        input:focus,
        select:focus {
            outline: 2px solid #198754;
            border-color: #198754;
        }

        button {
            width: 100%;
            padding: 13px;
            background: #198754;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #146c43;
        }

        .note {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }

        footer {
            text-align: center;
            padding: 22px;
            color: #666;
        }

        @media (max-width: 600px) {
            header {
                padding: 25px 20px;
            }

            .form-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>KursusKu</h1>
        <p>Belajar, daftar, dan kelola kursus dalam satu tempat.</p>

        <nav>
            <a href="/">Beranda</a>
            <a href="/#katalog">Katalog</a>
            <a href="/daftar">Daftar Kursus</a>
        </nav>
    </header>

    <main>
        <div class="form-card">
            <h2>Formulir Pendaftaran Kursus</h2>

            <p class="note">
                Silakan isi data dengan benar.
                Kolom bertanda * wajib diisi.
            </p>

            <form action="/daftar" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama">Nama Lengkap *</label>
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        placeholder="Masukkan nama lengkap"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email *</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="contoh@email.com"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="kursus">Pilih Kursus *</label>
                    <select id="kursus" name="kursus" required>
                        <option value="">-- Pilih kursus --</option>
                        <option value="WEB-01">Web Dasar</option>
                        <option value="PHP-01">PHP Dasar</option>
                        <option value="LAR-01">Laravel Fundamental</option>
                    </select>
                </div>

                <button type="submit">Kirim Pendaftaran</button>
            </form>
        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} KursusKu. Semua hak dilindungi.
    </footer>

</body>
</html>
