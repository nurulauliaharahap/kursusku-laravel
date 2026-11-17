<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Enrollment - KursusKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f7f5;
            color: #263b32;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background: #103d32;
            color: white;
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            border-bottom: 4px solid #198754;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .logo span {
            color: #7ed957;
        }

        .nav-links {
            display: flex;
            gap: 28px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            padding-bottom: 8px;
            transition: 0.3s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #7ed957;
            border-bottom: 3px solid #7ed957;
        }

        /* CONTAINER */
        .container {
            width: 92%;
            max-width: 1200px;
            margin: 45px auto 65px;
        }

        /* HEADER */
        .header {
            background: linear-gradient(135deg, #14532d, #198754);
            color: white;
            padding: 30px;
            border-radius: 14px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(20, 83, 45, 0.15);
        }

        .header h2 {
            font-size: 27px;
            margin-bottom: 10px;
        }

        .header p {
            color: #e0f2e7;
            line-height: 1.6;
            font-size: 14px;
        }

        /* CONTENT */
        .content {
            background: white;
            padding: 28px;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 18px;
            margin-bottom: 25px;
        }

        .top-bar h3 {
            color: #14532d;
            font-size: 20px;
        }

        .top-bar p {
            color: #888;
            font-size: 13px;
            margin-top: 7px;
        }

        .actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        /* BUTTON */
        .button {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 13px;
            transition: 0.3s;
        }

        .btn-home {
            background: #e5f3e9;
            color: #14532d;
            border: 1px solid #c5e5d0;
        }

        .btn-add {
            background: #198754;
            color: white;
            box-shadow: 0 3px 8px rgba(25, 135, 84, 0.2);
        }

        .btn-home:hover {
            background: #d1e9d9;
        }

        .btn-add:hover {
            background: #126b40;
            transform: translateY(-2px);
        }

        /* ALERT */
        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 15px 18px;
            border-radius: 8px;
            border-left: 5px solid #198754;
            margin-bottom: 22px;
            font-size: 14px;
        }

        /* TABLE */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 9px;
            border: 1px solid #e5eee8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        thead {
            background: #14532d;
            color: white;
        }

        th {
            padding: 17px 15px;
            text-align: left;
            font-size: 13px;
            letter-spacing: 0.4px;
        }

        td {
            padding: 17px 15px;
            border-bottom: 1px solid #e8f0eb;
            font-size: 14px;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #f0fdf4;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .number {
            color: #15803d;
            font-weight: bold;
            width: 55px;
        }

        .participant-name {
            font-weight: bold;
            color: #14532d;
            margin-bottom: 5px;
        }

        .course-name {
            font-weight: bold;
            color: #334b3b;
            margin-bottom: 6px;
        }

        .course-code {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            padding: 6px 10px;
            border-radius: 5px;
            font-size: 11px;
            font-weight: bold;
        }

        .date {
            color: #64748b;
        }

        .empty {
            text-align: center;
            padding: 45px 20px;
            color: #64748b;
            line-height: 1.8;
        }

        .empty-icon {
            display: block;
            font-size: 32px;
            margin-bottom: 10px;
        }

        /* TOTAL */
        .total {
            margin-top: 22px;
            padding: 18px 20px;
            background: #e8f5ec;
            border: 1px solid #cce8d5;
            border-radius: 9px;
            color: #14532d;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .total-label {
            font-size: 14px;
            font-weight: bold;
        }

        .total-number {
            font-size: 21px;
            font-weight: bold;
            color: #15803d;
        }

        /* FOOTER */
        footer {
            background: #103d32;
            color: white;
            padding: 30px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            border-top: 4px solid #198754;
        }

        .footer-text {
            color: #c4d4cd;
            font-size: 13px;
            margin-top: 9px;
        }

        .footer-links {
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            font-size: 13px;
        }

        .footer-links a:hover {
            color: #7ed957;
        }

        /* RESPONSIVE */
        @media (max-width: 650px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-links {
                gap: 17px;
            }

            .container {
                width: 94%;
                margin: 25px auto 45px;
            }

            .header {
                padding: 23px;
            }

            .header h2 {
                font-size: 22px;
            }

            .content {
                padding: 17px;
            }

            .top-bar {
                align-items: flex-start;
                flex-direction: column;
            }

            .actions {
                width: 100%;
            }

            .button {
                text-align: center;
            }

            footer {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="logo">
            KursusKu<span>.</span>
        </div>

        <div class="nav-links">

            <a href="{{ route('home') }}">
                Beranda
            </a>

            <a href="{{ url('/courses') }}">
                Daftar Kursus
            </a>

            <a href="{{ route('enrollments.index') }}" class="active">
                Pendaftaran
            </a>

        </div>

    </nav>


    <!-- MAIN CONTENT -->
    <div class="container">

        <!-- HEADER -->
        <div class="header">

            <h2>Laporan Enrollment KursusKu</h2>

            <p>
                Halaman ini menampilkan daftar peserta yang telah
                terdaftar pada kursus di KursusKu.
                Kelola data pendaftaran peserta dengan mudah.
            </p>

        </div>


        <!-- CONTENT -->
        <div class="content">

            <!-- NOTIFIKASI BERHASIL -->
            @if(session('success'))

                <div class="alert-success">
                    ✓ {{ session('success') }}
                </div>

            @endif


            <!-- TOP BAR -->
            <div class="top-bar">

                <div>

                    <h3>Data Pendaftaran Peserta</h3>

                    <p>
                        Berikut merupakan daftar enrollment peserta.
                    </p>

                </div>


                <div class="actions">

                    <a href="{{ route('home') }}"
                       class="button btn-home">
                        ← Beranda
                    </a>

                    <a href="{{ route('enrollments.create') }}"
                       class="button btn-add">
                        + Tambah Enrollment
                    </a>

                </div>

            </div>


            <!-- TABLE -->
            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>No.</th>
                            <th>Nama Peserta</th>
                            <th>Nama Kursus</th>
                            <th>Kode Kursus</th>
                            <th>Tanggal Pendaftaran</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($enrollments as $enrollment)

                            <tr>

                                <!-- NOMOR -->
                                <td class="number">
                                    {{ $loop->iteration }}
                                </td>


                                <!-- NAMA PESERTA -->
                                <td>

                                    <div class="participant-name">
                                        {{ $enrollment->participant?->name ?? 'Data peserta tidak ditemukan' }}
                                    </div>

                                    <small style="color:#888;">
                                        {{ $enrollment->participant?->email ?? '-' }}
                                    </small>

                                </td>


                                <!-- NAMA KURSUS -->
                                <td>

                                    <div class="course-name">
                                        {{ $enrollment->course?->name ?? 'Data kursus tidak ditemukan' }}
                                    </div>

                                </td>


                                <!-- KODE KURSUS -->
                                <td>

                                    <span class="course-code">
                                        {{ $enrollment->course?->code ?? '-' }}
                                    </span>

                                </td>


                                <!-- TANGGAL PENDAFTARAN -->
                                <td class="date">

                                    {{ $enrollment->created_at
                                        ? $enrollment->created_at->format('d-m-Y')
                                        : '-' }}

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td colspan="5" class="empty">

                                    <span class="empty-icon">📋</span>

                                    <strong>Belum Ada Data Enrollment</strong>

                                    <br>

                                    Silakan tambahkan peserta melalui
                                    tombol Tambah Enrollment.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <!-- TOTAL DATA -->
            <div class="total">

                <div class="total-label">
                    Total Pendaftaran Peserta
                </div>

                <div class="total-number">
                    {{ $enrollments->count() }} Data
                </div>

            </div>

        </div>

    </div>


    <!-- FOOTER -->
    <footer>

        <div>

            <div class="logo">
                KursusKu<span>.</span>
            </div>

            <p class="footer-text">
                Platform pembelajaran web berbasis
                untuk mahasiswa dan pengembang pemula.
            </p>

        </div>


        <div class="footer-links">

            <a href="{{ route('home') }}">Beranda</a>

            <a href="{{ url('/courses') }}">Daftar Kursus</a>

            <a href="{{ route('enrollments.index') }}">Pendaftaran</a>

        </div>

    </footer>

</body>
</html>