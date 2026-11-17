<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form Enrollment - KursusKu</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f0f7f2;
            color: #17312b;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(135deg, #0f5132, #198754);
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            border-bottom: 4px solid #7ed957;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
        }

        .logo span {
            color: #7ed957;
        }

        .navbar p {
            font-size: 14px;
            color: #d9f5e3;
            margin-top: 5px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #b9f6ca;
        }

        /* CONTAINER */
        .container {
            max-width: 750px;
            margin: 55px auto;
            padding: 20px;
        }

        /* FORM CARD */
        .form-card {
            background: white;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(15, 81, 50, 0.12);
            border-top: 6px solid #198754;
        }

        .form-card h1 {
            color: #0f5132;
            font-size: 29px;
            margin-bottom: 12px;
        }

        .description {
            color: #64756b;
            line-height: 1.7;
            margin-bottom: 28px;
            font-size: 14px;
        }

        /* SECTION */
        .section-title {
            color: #14532d;
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 16px;
        }

        /* PILIHAN PESERTA */
        .mode-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 22px;
        }

        .mode-option {
            border: 1px solid #c9dfd0;
            border-radius: 10px;
            padding: 16px;
            cursor: pointer;
            background: #f8fcf9;
            transition: 0.3s;
        }

        .mode-option:has(input:checked) {
            border: 2px solid #198754;
            background: #eaf7ef;
        }

        .mode-option input {
            width: auto;
            margin-right: 7px;
            accent-color: #198754;
        }

        .mode-option strong {
            color: #14532d;
            font-size: 14px;
        }

        .mode-option p {
            color: #718078;
            font-size: 12px;
            margin-top: 8px;
            line-height: 1.5;
        }

        /* FORM GROUP */
        .form-group {
            margin-bottom: 21px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #174d32;
            font-size: 14px;
        }

        input,
        select {
            width: 100%;
            padding: 14px;
            border: 1px solid #b9d9c5;
            border-radius: 9px;
            background: #f9fcfa;
            color: #17312b;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        select:focus {
            border-color: #198754;
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.12);
        }

        input::placeholder {
            color: #a0aaa4;
        }

        /* INFO */
        .info {
            background: #e9f7ee;
            border-left: 4px solid #198754;
            color: #176b48;
            padding: 13px 16px;
            border-radius: 7px;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 22px;
        }

        /* ERROR MESSAGE */
        .error-box {
            background: #fff1f1;
            border: 1px solid #f5bcbc;
            border-left: 5px solid #dc3545;
            border-radius: 10px;
            padding: 18px 20px;
            margin-bottom: 25px;
            animation: muncul 0.3s ease;
        }

        .error-title {
            color: #b42318;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 9px;
        }

        .error-title span {
            margin-right: 7px;
            font-size: 18px;
        }

        .error-message {
            color: #c62828;
            font-size: 14px;
            line-height: 1.7;
        }

        .error-message p {
            margin: 0;
        }

        /* ANIMATION */
        @keyframes muncul {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* BUTTONS */
        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 14px 22px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            border: none;
            transition: 0.3s;
        }

        .btn-submit {
            background: #198754;
            color: white;
            flex: 1;
        }

        .btn-submit:hover {
            background: #0f5132;
            transform: translateY(-2px);
        }

        .btn-home {
            background: #e5f3e9;
            color: #0f5132;
            border: 1px solid #198754;
        }

        .btn-home:hover {
            background: #cce8d5;
            transform: translateY(-2px);
        }

        .btn-submit:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        /* HIDDEN */
        .hidden {
            display: none;
        }

        /* FOOTER */
        .footer {
            background: #103d32;
            color: white;
            text-align: center;
            padding: 25px 15px;
            border-top: 4px solid #198754;
        }

        .footer p {
            color: #c4d4cd;
            font-size: 13px;
            margin-top: 9px;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {

            .navbar {
                padding: 18px 6%;
                flex-wrap: wrap;
                gap: 12px;
            }

            .container {
                margin: 25px auto;
            }

            .form-card {
                padding: 25px;
            }

            .form-card h1 {
                font-size: 24px;
            }

            .mode-group {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

        }

    </style>

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div>
            <div class="logo">
                KursusKu<span>.</span>
            </div>

            <p>Platform Belajar Online</p>
        </div>

        <a href="{{ route('enrollments.index') }}">
            ← Laporan Enrollment
        </a>

    </nav>


    <!-- FORM ENROLLMENT -->
    <div class="container">

        <div class="form-card">

            <h1>Form Enrollment</h1>

            <p class="description">
                Selamat datang di pendaftaran KursusKu.
                Silakan pilih peserta atau tambahkan peserta baru,
                kemudian tentukan kursus yang ingin diikuti
                untuk memulai proses pembelajaran.
            </p>


            <!-- PESAN ERROR -->
            @if ($errors->any())

                <div class="error-box">

                    <div class="error-title">
                        <span>⚠</span>
                        Pendaftaran Tidak Berhasil
                    </div>

                    <div class="error-message">

                        @foreach ($errors->all() as $error)

                            <p>{{ $error }}</p>

                        @endforeach

                    </div>

                </div>

            @endif


            <!-- FORM -->
            <form action="{{ route('enrollments.store') }}"
                  method="POST"
                  id="enrollmentForm">

                @csrf


                <!-- PILIH JENIS PESERTA -->
                <div class="section-title">
                    1. Pilih Jenis Pendaftaran
                </div>


                <div class="mode-group">

                    <label class="mode-option">

                        <input type="radio"
                               name="participant_mode"
                               value="existing"
                               id="modeExisting"
                               checked>

                        <strong>Peserta Lama</strong>

                        <p>
                            Pilih peserta yang sudah terdaftar
                            di dalam database.
                        </p>

                    </label>


                    <label class="mode-option">

                        <input type="radio"
                               name="participant_mode"
                               value="new"
                               id="modeNew">

                        <strong>Peserta Baru</strong>

                        <p>
                            Tambahkan nama dan email peserta
                            baru ke dalam sistem.
                        </p>

                    </label>

                </div>


                <!-- PESERTA LAMA -->
                <div id="existingSection">

                    <div class="form-group">

                        <label for="participant_id">
                            Pilih Nama Peserta
                        </label>

                        <select name="participant_id"
                                id="participant_id"
                                required>

                            <option value="">
                                -- Pilih Peserta --
                            </option>

                            @foreach ($participants as $participant)

                                <option
                                    value="{{ $participant->id }}"
                                    {{ old('participant_id') == $participant->id ? 'selected' : '' }}>

                                    {{ $participant->name }}
                                    ({{ $participant->email }})

                                </option>

                            @endforeach

                        </select>

                    </div>


                    @if ($participants->isEmpty())

                        <div class="info">
                            Belum ada peserta yang terdaftar.
                            Silakan pilih Peserta Baru untuk
                            menambahkan peserta pertama.
                        </div>

                    @endif

                </div>


                <!-- PESERTA BARU -->
                <div id="newSection" class="hidden">

                    <div class="info">
                        Isi nama lengkap dan email peserta baru.
                        Data peserta akan otomatis disimpan
                        ke database setelah pendaftaran berhasil.
                    </div>


                    <div class="form-group">

                        <label for="participant_name">
                            Nama Lengkap Peserta
                        </label>

                        <input
                            type="text"
                            name="participant_name"
                            id="participant_name"
                            placeholder="Contoh: Nurul Aulia"
                            value="{{ old('participant_name') }}"
                            maxlength="255"
                        >

                    </div>


                    <div class="form-group">

                        <label for="participant_email">
                            Email Peserta
                        </label>

                        <input
                            type="email"
                            name="participant_email"
                            id="participant_email"
                            placeholder="Contoh: nurul@gmail.com"
                            value="{{ old('participant_email') }}"
                        >

                    </div>

                </div>


                <!-- PILIH KURSUS -->
                <div class="section-title">
                    2. Pilih Kursus
                </div>


                <div class="form-group">

                    <label for="course_id">
                        Kursus yang Ingin Diikuti
                    </label>

                    <select name="course_id"
                            id="course_id"
                            required>

                        <option value="">
                            -- Pilih Kursus --
                        </option>

                        @foreach ($courses as $course)

                            <option
                                value="{{ $course->id }}"
                                {{ old('course_id') == $course->id ? 'selected' : '' }}>

                                {{ $course->name }}
                                ({{ $course->code }})

                            </option>

                        @endforeach

                    </select>

                </div>


                @if ($courses->isEmpty())

                    <div class="error-box">

                        <div class="error-title">
                            ⚠ Kursus Belum Tersedia
                        </div>

                        <div class="error-message">
                            Belum ada kursus dengan status open.
                            Silakan tambahkan kursus terlebih dahulu.
                        </div>

                    </div>

                @endif


                <!-- TOMBOL -->
                <div class="button-group">

                    <a href="{{ route('enrollments.index') }}"
                       class="btn btn-home">

                        ← Kembali

                    </a>


                    <button type="submit"
                            class="btn btn-submit"
                            {{ $courses->isEmpty() ? 'disabled' : '' }}>

                        Daftarkan Peserta

                    </button>

                </div>


            </form>

        </div>

    </div>


    <!-- FOOTER -->
    <footer class="footer">

        <div class="logo">
            KursusKu<span>.</span>
        </div>

        <p>
            © 2026 KursusKu - Belajar, Berkembang, dan Berhasil.
        </p>

    </footer>


    <!-- JAVASCRIPT -->
    <script>

        const modeExisting = document.getElementById('modeExisting');

        const modeNew = document.getElementById('modeNew');

        const existingSection = document.getElementById('existingSection');

        const newSection = document.getElementById('newSection');

        const participantId = document.getElementById('participant_id');

        const participantName = document.getElementById('participant_name');

        const participantEmail = document.getElementById('participant_email');


        // Mengatur pilihan peserta
        function changeParticipantMode() {

            if (modeExisting.checked) {

                // Menampilkan peserta lama
                existingSection.classList.remove('hidden');

                newSection.classList.add('hidden');


                // Mengaktifkan pilihan peserta lama
                participantId.disabled = false;

                participantId.required = true;


                // Menonaktifkan input peserta baru
                participantName.disabled = true;

                participantEmail.disabled = true;

                participantName.required = false;

                participantEmail.required = false;

            } else {

                // Menampilkan form peserta baru
                existingSection.classList.add('hidden');

                newSection.classList.remove('hidden');


                // Menonaktifkan pilihan peserta lama
                participantId.disabled = true;

                participantId.required = false;


                // Mengaktifkan input peserta baru
                participantName.disabled = false;

                participantEmail.disabled = false;

                participantName.required = true;

                participantEmail.required = true;

            }

        }


        // Menjalankan pilihan mode
        modeExisting.addEventListener(
            'change',
            changeParticipantMode
        );

        modeNew.addEventListener(
            'change',
            changeParticipantMode
        );


        // Mengembalikan pilihan setelah validasi gagal
        @if(old('participant_name'))

            modeNew.checked = true;

        @endif


        // Menjalankan pengaturan awal
        changeParticipantMode();

    </script>

</body>
</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form Enrollment - KursusKu</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f0f7f2;
            color: #17312b;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(135deg, #0f5132, #198754);
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            border-bottom: 4px solid #7ed957;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
        }

        .logo span {
            color: #7ed957;
        }

        .navbar p {
            font-size: 14px;
            color: #d9f5e3;
            margin-top: 5px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #b9f6ca;
        }

        /* CONTAINER */
        .container {
            max-width: 750px;
            margin: 55px auto;
            padding: 20px;
        }

        /* FORM CARD */
        .form-card {
            background: white;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(15, 81, 50, 0.12);
            border-top: 6px solid #198754;
        }

        .form-card h1 {
            color: #0f5132;
            font-size: 29px;
            margin-bottom: 12px;
        }

        .description {
            color: #64756b;
            line-height: 1.7;
            margin-bottom: 28px;
            font-size: 14px;
        }

        /* SECTION */
        .section-title {
            color: #14532d;
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 16px;
        }

        /* PILIHAN PESERTA */
        .mode-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 22px;
        }

        .mode-option {
            border: 1px solid #c9dfd0;
            border-radius: 10px;
            padding: 16px;
            cursor: pointer;
            background: #f8fcf9;
            transition: 0.3s;
        }

        .mode-option:has(input:checked) {
            border: 2px solid #198754;
            background: #eaf7ef;
        }

        .mode-option input {
            width: auto;
            margin-right: 7px;
            accent-color: #198754;
        }

        .mode-option strong {
            color: #14532d;
            font-size: 14px;
        }

        .mode-option p {
            color: #718078;
            font-size: 12px;
            margin-top: 8px;
            line-height: 1.5;
        }

        /* FORM GROUP */
        .form-group {
            margin-bottom: 21px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #174d32;
            font-size: 14px;
        }

        input,
        select {
            width: 100%;
            padding: 14px;
            border: 1px solid #b9d9c5;
            border-radius: 9px;
            background: #f9fcfa;
            color: #17312b;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        select:focus {
            border-color: #198754;
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.12);
        }

        input::placeholder {
            color: #a0aaa4;
        }

        /* INFO */
        .info {
            background: #e9f7ee;
            border-left: 4px solid #198754;
            color: #176b48;
            padding: 13px 16px;
            border-radius: 7px;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 22px;
        }

        /* ERROR MESSAGE */
        .error-box {
            background: #fff1f1;
            border: 1px solid #f5bcbc;
            border-left: 5px solid #dc3545;
            border-radius: 10px;
            padding: 18px 20px;
            margin-bottom: 25px;
            animation: muncul 0.3s ease;
        }

        .error-title {
            color: #b42318;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 9px;
        }

        .error-title span {
            margin-right: 7px;
            font-size: 18px;
        }

        .error-message {
            color: #c62828;
            font-size: 14px;
            line-height: 1.7;
        }

        .error-message p {
            margin: 0;
        }

        /* ANIMATION */
        @keyframes muncul {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* BUTTONS */
        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 14px 22px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            border: none;
            transition: 0.3s;
        }

        .btn-submit {
            background: #198754;
            color: white;
            flex: 1;
        }

        .btn-submit:hover {
            background: #0f5132;
            transform: translateY(-2px);
        }

        .btn-home {
            background: #e5f3e9;
            color: #0f5132;
            border: 1px solid #198754;
        }

        .btn-home:hover {
            background: #cce8d5;
            transform: translateY(-2px);
        }

        .btn-submit:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        /* HIDDEN */
        .hidden {
            display: none;
        }

        /* FOOTER */
        .footer {
            background: #103d32;
            color: white;
            text-align: center;
            padding: 25px 15px;
            border-top: 4px solid #198754;
        }

        .footer p {
            color: #c4d4cd;
            font-size: 13px;
            margin-top: 9px;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {

            .navbar {
                padding: 18px 6%;
                flex-wrap: wrap;
                gap: 12px;
            }

            .container {
                margin: 25px auto;
            }

            .form-card {
                padding: 25px;
            }

            .form-card h1 {
                font-size: 24px;
            }

            .mode-group {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

        }

    </style>

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div>
            <div class="logo">
                KursusKu<span>.</span>
            </div>

            <p>Platform Belajar Online</p>
        </div>

        <a href="{{ route('enrollments.index') }}">
            ← Laporan Enrollment
        </a>

    </nav>


    <!-- FORM ENROLLMENT -->
    <div class="container">

        <div class="form-card">

            <h1>Form Enrollment</h1>

            <p class="description">
                Selamat datang di pendaftaran KursusKu.
                Silakan pilih peserta atau tambahkan peserta baru,
                kemudian tentukan kursus yang ingin diikuti
                untuk memulai proses pembelajaran.
            </p>


            <!-- PESAN ERROR -->
            @if ($errors->any())

                <div class="error-box">

                    <div class="error-title">
                        <span>⚠</span>
                        Pendaftaran Tidak Berhasil
                    </div>

                    <div class="error-message">

                        @foreach ($errors->all() as $error)

                            <p>{{ $error }}</p>

                        @endforeach

                    </div>

                </div>

            @endif


            <!-- FORM -->
            <form action="{{ route('enrollments.store') }}"
                  method="POST"
                  id="enrollmentForm">

                @csrf


                <!-- PILIH JENIS PESERTA -->
                <div class="section-title">
                    1. Pilih Jenis Pendaftaran
                </div>


                <div class="mode-group">

                    <label class="mode-option">

                        <input type="radio"
                               name="participant_mode"
                               value="existing"
                               id="modeExisting"
                               checked>

                        <strong>Peserta Lama</strong>

                        <p>
                            Pilih peserta yang sudah terdaftar
                            di dalam database.
                        </p>

                    </label>


                    <label class="mode-option">

                        <input type="radio"
                               name="participant_mode"
                               value="new"
                               id="modeNew">

                        <strong>Peserta Baru</strong>

                        <p>
                            Tambahkan nama dan email peserta
                            baru ke dalam sistem.
                        </p>

                    </label>

                </div>


                <!-- PESERTA LAMA -->
                <div id="existingSection">

                    <div class="form-group">

                        <label for="participant_id">
                            Pilih Nama Peserta
                        </label>

                        <select name="participant_id"
                                id="participant_id"
                                required>

                            <option value="">
                                -- Pilih Peserta --
                            </option>

                            @foreach ($participants as $participant)

                                <option
                                    value="{{ $participant->id }}"
                                    {{ old('participant_id') == $participant->id ? 'selected' : '' }}>

                                    {{ $participant->name }}
                                    ({{ $participant->email }})

                                </option>

                            @endforeach

                        </select>

                    </div>


                    @if ($participants->isEmpty())

                        <div class="info">
                            Belum ada peserta yang terdaftar.
                            Silakan pilih Peserta Baru untuk
                            menambahkan peserta pertama.
                        </div>

                    @endif

                </div>


                <!-- PESERTA BARU -->
                <div id="newSection" class="hidden">

                    <div class="info">
                        Isi nama lengkap dan email peserta baru.
                        Data peserta akan otomatis disimpan
                        ke database setelah pendaftaran berhasil.
                    </div>


                    <div class="form-group">

                        <label for="participant_name">
                            Nama Lengkap Peserta
                        </label>

                        <input
                            type="text"
                            name="participant_name"
                            id="participant_name"
                            placeholder="Contoh: Nurul Aulia"
                            value="{{ old('participant_name') }}"
                            maxlength="255"
                        >

                    </div>


                    <div class="form-group">

                        <label for="participant_email">
                            Email Peserta
                        </label>

                        <input
                            type="email"
                            name="participant_email"
                            id="participant_email"
                            placeholder="Contoh: nurul@gmail.com"
                            value="{{ old('participant_email') }}"
                        >

                    </div>

                </div>


                <!-- PILIH KURSUS -->
                <div class="section-title">
                    2. Pilih Kursus
                </div>


                <div class="form-group">

                    <label for="course_id">
                        Kursus yang Ingin Diikuti
                    </label>

                    <select name="course_id"
                            id="course_id"
                            required>

                        <option value="">
                            -- Pilih Kursus --
                        </option>

                        @foreach ($courses as $course)

                            <option
                                value="{{ $course->id }}"
                                {{ old('course_id') == $course->id ? 'selected' : '' }}>

                                {{ $course->name }}
                                ({{ $course->code }})

                            </option>

                        @endforeach

                    </select>

                </div>


                @if ($courses->isEmpty())

                    <div class="error-box">

                        <div class="error-title">
                            ⚠ Kursus Belum Tersedia
                        </div>

                        <div class="error-message">
                            Belum ada kursus dengan status open.
                            Silakan tambahkan kursus terlebih dahulu.
                        </div>

                    </div>

                @endif


                <!-- TOMBOL -->
                <div class="button-group">

                    <a href="{{ route('enrollments.index') }}"
                       class="btn btn-home">

                        ← Kembali

                    </a>


                    <button type="submit"
                            class="btn btn-submit"
                            {{ $courses->isEmpty() ? 'disabled' : '' }}>

                        Daftarkan Peserta

                    </button>

                </div>


            </form>

        </div>

    </div>


    <!-- FOOTER -->
    <footer class="footer">

        <div class="logo">
            KursusKu<span>.</span>
        </div>

        <p>
            © 2026 KursusKu - Belajar, Berkembang, dan Berhasil.
        </p>

    </footer>


    <!-- JAVASCRIPT -->
    <script>

        const modeExisting = document.getElementById('modeExisting');

        const modeNew = document.getElementById('modeNew');

        const existingSection = document.getElementById('existingSection');

        const newSection = document.getElementById('newSection');

        const participantId = document.getElementById('participant_id');

        const participantName = document.getElementById('participant_name');

        const participantEmail = document.getElementById('participant_email');


        // Mengatur pilihan peserta
        function changeParticipantMode() {

            if (modeExisting.checked) {

                // Menampilkan peserta lama
                existingSection.classList.remove('hidden');

                newSection.classList.add('hidden');


                // Mengaktifkan pilihan peserta lama
                participantId.disabled = false;

                participantId.required = true;


                // Menonaktifkan input peserta baru
                participantName.disabled = true;

                participantEmail.disabled = true;

                participantName.required = false;

                participantEmail.required = false;

            } else {

                // Menampilkan form peserta baru
                existingSection.classList.add('hidden');

                newSection.classList.remove('hidden');


                // Menonaktifkan pilihan peserta lama
                participantId.disabled = true;

                participantId.required = false;


                // Mengaktifkan input peserta baru
                participantName.disabled = false;

                participantEmail.disabled = false;

                participantName.required = true;

                participantEmail.required = true;

            }

        }


        // Menjalankan pilihan mode
        modeExisting.addEventListener(
            'change',
            changeParticipantMode
        );

        modeNew.addEventListener(
            'change',
            changeParticipantMode
        );


        // Mengembalikan pilihan setelah validasi gagal
        @if(old('participant_name'))

            modeNew.checked = true;

        @endif


        // Menjalankan pengaturan awal
        changeParticipantMode();

    </script>

</body>
</html>