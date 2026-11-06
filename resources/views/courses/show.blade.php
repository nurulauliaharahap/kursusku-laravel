@extends('layouts.app')

@section('title', 'Detail Kursus - KursusKu')

@section('content')

<style>
    .detail-wrapper {
        max-width: 850px;
        margin: 20px auto;
        background: white;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 5px 18px rgba(0, 80, 40, 0.08);
    }

    .detail-header {
        background: linear-gradient(135deg, #14532d, #22a05a);
        color: white;
        padding: 20px 25px;
    }

    .detail-header h1 {
        color: white;
        margin: 0 0 5px;
        font-size: 25px;
    }

    .detail-header p {
        margin: 0;
        color: #dcfce7;
    }

    .detail-body {
        padding: 20px 25px;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .detail-item {
        background: #f0fdf4;
        border: 1px solid #dcfce7;
        border-radius: 9px;
        padding: 12px 15px;
    }

    .detail-item strong {
        display: block;
        color: #166534;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .detail-item span {
        color: #374151;
        font-size: 15px;
    }

    .detail-actions {
        margin-top: 18px;
        display: flex;
        gap: 10px;
    }

    .btn-back {
        display: inline-block;
        background: #15803d;
        color: white;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
    }

    @media (max-width: 600px) {
        .detail-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="detail-wrapper">

    <div class="detail-header">
        <h1>Detail Kursus</h1>
        <p>Informasi lengkap kursus KursusKu</p>
    </div>

    <div class="detail-body">

        <div class="detail-grid">

            <div class="detail-item">
                <strong>Kode Kursus</strong>
                <span>{{ $course->code }}</span>
            </div>

            <div class="detail-item">
                <strong>Nama Kursus</strong>
                <span>{{ $course->name }}</span>
            </div>

            <div class="detail-item">
                <strong>Biaya Kursus</strong>
                <span>Rp {{ number_format($course->fee, 0, ',', '.') }}</span>
            </div>

            <div class="detail-item">
                <strong>Kuota Peserta</strong>
                <span>{{ $course->quota }} orang</span>
            </div>

            <div class="detail-item">
                <strong>Tanggal Mulai</strong>
                <span>{{ $course->start_date->format('d-m-Y') }}</span>
            </div>

            <div class="detail-item">
                <strong>Status Kursus</strong>
                <span>{{ ucfirst($course->status) }}</span>
            </div>

            <div class="detail-item" style="grid-column: 1 / -1;">
                <strong>Deskripsi Kursus</strong>
                <span>{{ $course->description ?? '-' }}</span>
            </div>

        </div>

        <div class="detail-actions">
            <a href="{{ route('courses.index') }}" class="btn-back">
                ← Kembali ke Daftar Kursus
            </a>
        </div>

    </div>
</div>

@endsection