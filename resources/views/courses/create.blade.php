@extends('layouts.app')

@section('title', 'Tambah Kursus - KursusKu')

@section('content')

<style>
    .course-form-wrapper {
        max-width: 850px;
        margin: 20px auto;
        padding: 0 15px;
    }

    .course-form-header {
        background: linear-gradient(135deg, #14532d, #22a05a);
        color: white;
        padding: 22px 28px;
        border-radius: 16px 16px 0 0;
    }

    .course-form-header h1 {
        color: white;
        margin: 0 0 7px;
        font-size: 25px;
    }

    .course-form-header p {
        margin: 0;
        color: #dcfce7;
        font-size: 14px;
    }

    .course-form-card {
        background: white;
        padding: 25px 28px;
        border-radius: 0 0 16px 16px;
        box-shadow: 0 5px 20px rgba(0, 80, 40, 0.08);
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px 18px;
    }

    .form-group {
        margin-bottom: 0;
        min-width: 0;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        color: #166534;
        margin-bottom: 6px;
        font-size: 14px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #bbf7d0;
        border-radius: 8px;
        background: #fafffb;
        box-sizing: border-box;
        font-size: 14px;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 65px;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: #16a34a;
        box-shadow: 0 0 0 3px #dcfce7;
    }

    .form-error {
        color: #dc2626;
        font-size: 12px;
        margin-top: 4px;
        display: block;
    }

    .error-box {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fca5a5;
        padding: 12px 16px;
        border-radius: 9px;
        margin-bottom: 16px;
        font-size: 13px;
    }

    .error-box ul {
        margin: 5px 0 0;
        padding-left: 20px;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
        padding-top: 16px;
        border-top: 1px solid #e5e7eb;
    }

    .btn-save,
    .btn-back {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 14px;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-save {
        background: #15803d;
        color: white;
        border: none;
    }

    .btn-save:hover {
        background: #14532d;
    }

    .btn-back {
        background: #e5e7eb;
        color: #374151;
    }

    .btn-back:hover {
        background: #d1d5db;
    }

    @media (max-width: 600px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full-width {
            grid-column: auto;
        }

        .course-form-card {
            padding: 18px;
        }

        .course-form-header {
            padding: 20px;
        }
    }
</style>

<div class="course-form-wrapper">

    <div class="course-form-header">
        <h1>Tambah Kursus Baru</h1>
        <p>Lengkapi informasi kursus yang ingin ditambahkan ke KursusKu.</p>
    </div>

    <div class="course-form-card">

        <form action="{{ route('courses.store') }}" method="POST">
            @csrf

            @if ($errors->any())
                <div class="error-box">
                    <strong>Data belum berhasil disimpan!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-grid">

                <div class="form-group">
                    <label for="code">Kode Kursus *</label>
                    <input type="text" id="code" name="code"
                        value="{{ old('code') }}"
                        placeholder="Contoh: WEB-101"
                        maxlength="20">
                    @error('code')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Nama Kursus *</label>
                    <input type="text" id="name" name="name"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Web Dasar"
                        maxlength="120">
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group full-width">
                    <label for="description">Deskripsi Kursus</label>
                    <textarea id="description" name="description"
                        rows="2"
                        placeholder="Tuliskan deskripsi kursus...">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fee">Biaya Kursus (Rp) *</label>
                    <input type="number" id="fee" name="fee"
                        value="{{ old('fee', 0) }}"
                        min="0" placeholder="300000">
                    @error('fee')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="quota">Kuota Peserta *</label>
                    <input type="number" id="quota" name="quota"
                        value="{{ old('quota', 20) }}"
                        min="1" max="500">
                    @error('quota')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="start_date">Tanggal Mulai *</label>
                    <input type="date" id="start_date" name="start_date"
                        value="{{ old('start_date') }}">
                    @error('start_date')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status Kursus *</label>
                    <select id="status" name="status">
                        <option value="draft"
                            {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                        <option value="open"
                            {{ old('status') == 'open' ? 'selected' : '' }}>
                            Open
                        </option>

                        <option value="closed"
                            {{ old('status') == 'closed' ? 'selected' : '' }}>
                            Closed
                        </option>
                    </select>
                    @error('status')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="form-actions">
                <button type="submit" class="btn-save">
                    ✓ Simpan Kursus
                </button>

                <a href="{{ route('courses.index') }}" class="btn-back">
                    ← Kembali
                </a>
            </div>

        </form>

    </div>
</div>

@endsection