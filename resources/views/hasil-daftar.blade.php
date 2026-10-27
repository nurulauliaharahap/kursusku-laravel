<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran - KursusKu</title>

    <style>
        body {
            margin: 0;
            padding: 30px 15px;
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        .card {
            max-width: 600px;
            margin: 30px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 12px #00000012;
        }

        h1 {
            color: #198754;
        }

        .detail {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 18px;
            background: #198754;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>Pendaftaran Berhasil!</h1>

        <p>Data pendaftaran berhasil divalidasi.</p>

        <div class="detail">
            <strong>Nama:</strong>
            {{ $pendaftaran['nama'] }}
        </div>

        <div class="detail">
            <strong>Email:</strong>
            {{ $pendaftaran['email'] }}
        </div>

        <div class="detail">
            <strong>Kode Kursus:</strong>
            {{ $pendaftaran['kursus'] }}
        </div>

        <a href="/">Kembali ke Beranda</a>
    </div>

</body>
</html>