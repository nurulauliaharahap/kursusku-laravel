@extends('layouts.app')

@section('title', 'Profil Saya - KursusKu')

@section('content')

<style>
    .profile-page {
        padding: 5px 0 15px;
    }

    .profile-heading {
        margin-bottom: 15px;
    }

    .profile-heading h2 {
        color: #14532d;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .profile-heading p {
        color: #6b7280;
        font-size: 13px;
        margin-bottom: 0;
    }

    .profile-card {
        background: #ffffff;
        border: none;
        border-top: 4px solid #198754;
        border-radius: 11px;
        padding: 16px;
        height: auto;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
    }

    .profile-card h5 {
        color: #14532d;
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 13px;
    }

    .profile-card .form-label {
        color: #374151;
        font-weight: 600;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .profile-card .form-control {
        border: 1px solid #d1e5d9;
        border-radius: 7px;
        padding: 7px 10px;
        font-size: 13px;
    }

    .profile-card .form-control:focus {
        border-color: #198754;
        box-shadow: 0 0 0 2px rgba(25, 135, 84, 0.12);
    }

    .profile-card textarea {
        min-height: 65px;
        resize: vertical;
    }

    .profile-card .mb-3 {
        margin-bottom: 10px !important;
    }

    .profile-btn {
        background: #198754;
        color: white;
        border: none;
        border-radius: 7px;
        padding: 8px 15px;
        font-size: 13px;
        font-weight: 600;
    }

    .profile-btn:hover {
        background: #146c43;
        color: white;
    }

    .profile-info {
        display: flex;
        justify-content: space-between;
        gap: 8px;
        padding: 8px 0;
        border-bottom: 1px solid #edf2ee;
        font-size: 12px;
    }

    .profile-info:last-child {
        border-bottom: none;
    }

    .profile-info span:first-child {
        color: #6b7280;
    }

    .profile-info strong {
        color: #14532d;
        text-align: right;
        overflow-wrap: anywhere;
    }

    .profile-badge {
        display: inline-block;
        background: #d1fae5;
        color: #166534;
        border-radius: 20px;
        padding: 3px 9px;
        font-size: 11px;
        font-weight: 700;
    }

    .profile-note {
        color: #6b7280;
        font-size: 11px;
        line-height: 1.4;
        margin-bottom: 10px;
    }

    .profile-page .row {
        --bs-gutter-x: 16px;
        --bs-gutter-y: 16px;
        align-items: flex-start;
    }

    @media (max-width: 767px) {
        .profile-card {
            padding: 13px;
        }

        .profile-heading h2 {
            font-size: 21px;
        }
    }
</style>

<div class="profile-page">

    {{-- JUDUL HALAMAN --}}
    <div class="profile-heading">
        <h2>Profil Saya</h2>
        <p>
            Perbarui identitas, kontak, email login, dan password Anda.
        </p>
    </div>

    <div class="row">

        {{-- KOLOM KIRI: IDENTITAS DAN KONTAK --}}
        <div class="col-lg-8">

            <div class="profile-card">

                <h5>Identitas & Kontak</h5>

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- NAMA LENGKAP --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap *</label>

                            <input type="text"
                                   name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $user->name) }}"
                                   required>

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- EMAIL --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email Login *</label>

                            <input type="email"
                                   name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $user->email) }}"
                                   required>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <small class="text-muted" style="font-size: 10px;">
                                Email digunakan untuk login.
                            </small>
                        </div>

                        {{-- NOMOR HP --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nomor HP</label>

                            <input type="text"
                                   name="phone"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone', $user->phone) }}"
                                   placeholder="Contoh: 081234567890">

                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- JABATAN --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jabatan</label>

                            <input type="text"
                                   name="position"
                                   class="form-control @error('position') is-invalid @enderror"
                                   value="{{ old('position', $user->position) }}"
                                   placeholder="Contoh: Administrator">

                            @error('position')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- INSTANSI --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">Instansi / Unit</label>

                            <input type="text"
                                   name="institution"
                                   class="form-control @error('institution') is-invalid @enderror"
                                   value="{{ old('institution', $user->institution) }}"
                                   placeholder="Masukkan nama instansi">

                            @error('institution')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- ALAMAT --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">Alamat</label>

                            <textarea name="address"
                                      class="form-control @error('address') is-invalid @enderror"
                                      placeholder="Masukkan alamat lengkap">{{ old('address', $user->address) }}</textarea>

                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <button type="submit" class="profile-btn">
                        Simpan Perubahan
                    </button>

                </form>

            </div>
        </div>

        {{-- KOLOM KANAN --}}
        <div class="col-lg-4">

            {{-- INFORMASI AKSES --}}
            <div class="profile-card mb-3">

                <h5>Informasi Akses</h5>

                <div class="profile-info">
                    <span>Username</span>
                    <strong>{{ $user->username ?? '-' }}</strong>
                </div>

                <div class="profile-info">
                    <span>Role</span>
                    <strong>{{ ucfirst($user->role ?? 'user') }}</strong>
                </div>

                <div class="profile-info">
                    <span>Status</span>
                    <strong>
                        <span class="profile-badge">
                            {{ ucfirst($user->status ?? 'active') }}
                        </span>
                    </strong>
                </div>

                <div class="profile-info">
                    <span>Login Terakhir</span>
                    <strong>
                        {{ $user->last_login_at
                            ? $user->last_login_at->format('d/m/Y H:i')
                            : 'Belum tercatat' }}
                    </strong>
                </div>

            </div>

            {{-- GANTI PASSWORD --}}
            <div class="profile-card">

                <h5>Ganti Password</h5>

                <p class="profile-note">
                    Password baru minimal 8 karakter. Gunakan password
                    yang mudah diingat tetapi sulit ditebak.
                </p>

                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- PASSWORD LAMA --}}
                    <div class="mb-3">
                        <label class="form-label">Password Saat Ini</label>

                        <input type="password"
                               name="current_password"
                               class="form-control @error('current_password') is-invalid @enderror"
                               placeholder="Masukkan password saat ini"
                               required>

                        @error('current_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- PASSWORD BARU --}}
                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>

                        <input type="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Masukkan password baru"
                               required>

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- KONFIRMASI PASSWORD --}}
                    <div class="mb-3">
                        <label class="form-label">
                            Konfirmasi Password Baru
                        </label>

                        <input type="password"
                               name="password_confirmation"
                               class="form-control"
                               placeholder="Ulangi password baru"
                               required>
                    </div>

                    <button type="submit" class="profile-btn w-100">
                        Ganti Password
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection