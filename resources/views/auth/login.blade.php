<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e8f5ee, #f4faf6);
            min-height: 100vh;
            color: #263b32;
        }

        .navbar {
            background: #075b43;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 22px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .nav-links a:hover {
            color: #a7f3d0;
        }

        .login-wrapper {
            min-height: calc(100vh - 65px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 35px 15px;
        }

        .login-card {
            background: white;
            width: 100%;
            max-width: 460px;
            padding: 38px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 80, 50, 0.10);
        }

        .login-card h1 {
            color: #075b43;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #718078;
            font-size: 14px;
            margin-bottom: 28px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 9px;
        }

        .form-group input {
            width: 100%;
            padding: 13px;
            border: 1px solid #d6e5dc;
            border-radius: 7px;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #0b966c;
            box-shadow: 0 0 0 3px rgba(11, 150, 108, .10);
        }

        .password-wrapper {
            display: flex;
        }

        .password-wrapper input {
            border-radius: 7px 0 0 7px;
        }

        .toggle-password {
            border: 1px solid #d6e5dc;
            background: #f3faf6;
            padding: 0 13px;
            cursor: pointer;
            color: #075b43;
            border-radius: 0 7px 7px 0;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            margin: 5px 0 23px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .options a, .register a {
            color: #07845d;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 7px;
            background: #079568;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-login:hover {
            background: #067650;
        }

        .register {
            text-align: center;
            font-size: 14px;
            margin-top: 23px;
            color: #718078;
        }

        .back-home {
            text-align: center;
            margin-top: 17px;
        }

        .back-home a {
            color: #075b43;
            font-size: 14px;
        }

        .error-message {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        @media(max-width: 500px) {
            .navbar {
                padding: 16px;
            }

            .nav-links {
                gap: 10px;
            }

            .nav-links a {
                font-size: 12px;
            }

            .login-card {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="brand">KursusKu</div>

    <div class="nav-links">
        <a href="{{ route('home') }}">Beranda</a>
        <a href="{{ route('daftar') }}">Pendaftaran</a>
        <a href="{{ route('login') }}">Login</a>
    </div>
</nav>

<div class="login-wrapper">

    <div class="login-card">

        <h1>Selamat Datang 👋</h1>

        <p class="subtitle">
            Masuk dengan username atau email untuk melanjutkan.
        </p>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error-message" style="margin-bottom:15px">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Username / Email</label>

                <input
                    type="text"
                    name="login"
                    value="{{ old('login') }}"
                    placeholder="Masukkan username atau email"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label>Password</label>

                <div class="password-wrapper">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Masukkan password"
                        required
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        id="togglePassword"
                    >
                        Lihat
                    </button>
                </div>
            </div>

            <div class="options">
                <label class="remember">
                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                        {{ old('remember') ? 'checked' : '' }}
                    >
                    Ingat saya
                </label>

                <a href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            </div>

            <button type="submit" class="btn-login">
                Masuk
            </button>
        </form>

        <div class="register">
            Belum punya akun?
            <a href="{{ route('daftar') }}">Daftar sekarang</a>
        </div>

        <div class="back-home">
            <a href="{{ route('home') }}">← Kembali ke Beranda</a>
        </div>

    </div>

</div>

<script>
    const passwordInput = document.getElementById('password');
    const toggleButton = document.getElementById('togglePassword');

    toggleButton.addEventListener('click', function () {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.textContent = 'Sembunyikan';
        } else {
            passwordInput.type = 'password';
            toggleButton.textContent = 'Lihat';
        }
    });
</script>

</body>
</html>