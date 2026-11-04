@extends('layouts.app')

@section('title', 'Kelola Kursus')

@section('content')
<style>
    .course-page {
        background: #f4f8f5;
        padding: 28px;
        border-radius: 18px;
    }

    .course-header {
        background: linear-gradient(135deg, #087f5b, #20a675);
        color: white;
        padding: 30px;
        border-radius: 16px;
        margin-bottom: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .course-header h1 {
        font-size: 28px;
        font-weight: 700;
        margin: 0 0 8px;
    }

    .course-header p {
        margin: 0;
        opacity: .9;
    }

    .btn-add {
        background: white;
        color: #087f5b;
        padding: 12px 20px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 700;
    }

    .btn-add:hover {
        background: #e5f5ed;
        color: #065f46;
    }

    .summary-card {
        background: white;
        padding: 22px;
        border-radius: 14px;
        margin-bottom: 24px;
        box-shadow: 0 4px 15px rgba(0,0,0,.05);
    }

    .summary-card small {
        color: #6b7280;
    }

    .summary-card h2 {
        color: #087f5b;
        font-size: 30px;
        margin: 8px 0 0;
    }

    .table-card {
        background: white;
        border-radius: 15px;
        padding: 22px;
        box-shadow: 0 4px 15px rgba(0,0,0,.05);
        overflow-x: auto;
    }

    .table-card h3 {
        color: #14532d;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .course-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 750px;
    }

    .course-table th {
        background: #e8f5ed;
        color: #166534;
        padding: 14px;
        text-align: left;
    }

    .course-table td {
        padding: 14px;
        border-bottom: 1px solid #edf2ee;
    }

    .course-table tr:hover td {
        background: #f8fcf9;
    }

    .status {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .status-open {
        background: #dcfce7;
        color: #166534;
    }

    .status-draft {
        background: #fef3c7;
        color: #92400e;
    }

    .status-closed {
        background: #fee2e2;
        color: #991b1b;
    }

    .empty-message {
        text-align: center;
        padding: 30px;
        color: #6b7280;
    }
</style>

<div class="course-page">

    <div class="course-header">
        <div>
            <h1>Kelola KursusKu</h1>
            <p>Kelola dan pantau seluruh data kursus dengan mudah.</p>
        </div>

        <a href="{{ route('courses.create') }}" class="btn-add">
            + Tambah Kursus
        </a>
    </div>

    <div class="summary-card">
        <small>Total Kursus Terdaftar</small>
        <h2>{{ $courses->count() }}</h2>
    </div>

    <div class="table-card">
        <h3>Daftar Kursus</h3>

        <table class="course-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Nama Kursus</th>
                    <th>Biaya</th>
                    <th>Kuota</th>
                    <th>Tanggal Mulai</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($courses as $course)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $course->code }}</strong></td>
                        <td>{{ $course->name }}</td>
                        <td>Rp {{ number_format($course->fee, 0, ',', '.') }}</td>
                        <td>{{ $course->quota }} peserta</td>
                        <td>{{ $course->start_date->format('d-m-Y') }}</td>
                        <td>
                            <span class="status status-{{ $course->status }}">
                                {{ ucfirst($course->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty-message">
                            Belum ada kursus. Silakan tambahkan kursus baru.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection