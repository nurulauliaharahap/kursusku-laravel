@extends('layouts.app')

@section('title', 'Kelola Kursus')

@section('content')

<style>
    .course-page {
        background: #f4f8f5;
        padding: 28px;
        border-radius: 18px;
    }

    /* HEADER */
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

    /* SUMMARY */
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

    /* TABLE CARD */
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

    /* SEARCH DAN FILTER */
    .filter-box {
        background: #f4faf6;
        border: 1px solid #dcebe0;
        border-radius: 12px;
        padding: 17px;
        margin-bottom: 20px;
    }

    .filter-form {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .filter-form input,
    .filter-form select {
        padding: 11px 13px;
        border: 1px solid #cbd8ce;
        border-radius: 8px;
        font-size: 13px;
        background: white;
        outline: none;
    }

    .filter-form input {
        flex: 1;
        min-width: 200px;
    }

    .filter-form select {
        min-width: 150px;
    }

    .filter-form input:focus,
    .filter-form select:focus {
        border-color: #20a675;
    }

    .btn-search {
        background: #087f5b;
        color: white;
        padding: 11px 18px;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-search:hover {
        background: #065f46;
    }

    .btn-reset {
        background: #e5e7eb;
        color: #374151;
        padding: 11px 15px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
    }

    .result-info {
        color: #6b7280;
        font-size: 13px;
        margin-bottom: 13px;
    }

    /* TABEL */
    .course-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1050px;
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

    /* STATUS */
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

    /* TOMBOL AKSI */
    .btn-detail,
    .btn-edit,
    .btn-delete {
        display: inline-block;
        color: white;
        padding: 8px 12px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 13px;
        font-weight: bold;
        white-space: nowrap;
        border: none;
        cursor: pointer;
    }

    .btn-detail {
        background: #15803d;
    }

    .btn-detail:hover {
        background: #14532d;
        color: white;
    }

    .btn-edit {
        background: #2563eb;
        margin-left: 5px;
    }

    .btn-edit:hover {
        background: #1d4ed8;
        color: white;
    }

    .btn-delete {
        background: #dc2626;
        margin-left: 5px;
    }

    .btn-delete:hover {
        background: #b91c1c;
    }

    .action-form {
        display: inline-block;
        margin: 0;
    }

    /* NOTIFIKASI */
    .success-message {
        background: #dcfce7;
        color: #166534;
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .empty-message {
        text-align: center;
        padding: 30px;
        color: #6b7280;
    }

    /* TOTAL DATA */
    .total-info {
        background: #e8f5ed;
        color: #166534;
        padding: 15px 18px;
        border-radius: 10px;
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        font-weight: 700;
    }

    /* PAGINATION */
    .pagination-wrapper {
        margin-top: 22px;
        overflow-x: auto;
    }

    .pagination-wrapper nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }

    .pagination-wrapper nav div {
        margin-top: 5px;
    }

    /* Memperkecil ikon panah */
    .pagination-wrapper nav svg {
        width: 16px !important;
        height: 16px !important;
        max-width: 16px !important;
        max-height: 16px !important;
        display: inline-block;
        vertical-align: middle;
    }

    .pagination-wrapper nav a,
    .pagination-wrapper nav span {
        font-size: 13px;
    }

    .pagination-wrapper nav a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 36px;
        padding: 7px 12px;
        border: 1px solid #d1e5d7;
        border-radius: 7px;
        color: #087f5b;
        text-decoration: none;
        background: white;
    }

    .pagination-wrapper nav a:hover {
        background: #e8f5ed;
        color: #065f46;
    }

    .pagination-wrapper nav span[aria-current="page"] span {
        background: #087f5b;
        color: white;
        border-color: #087f5b;
        border-radius: 7px;
    }

    /* RESPONSIVE */
    @media (max-width: 600px) {
        .course-page {
            padding: 15px;
        }

        .course-header {
            padding: 22px;
        }

        .filter-form {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-form input,
        .filter-form select {
            width: 100%;
        }
    }
</style>

<div class="course-page">

    <!-- HEADER -->
    <div class="course-header">
        <div>
            <h1>Kelola KursusKu</h1>
            <p>Kelola dan pantau seluruh data kursus dengan mudah.</p>
        </div>

        <a href="{{ route('courses.create') }}" class="btn-add">
            + Tambah Kursus
        </a>
    </div>

    <!-- NOTIFIKASI -->
    @if(session('success'))
        <div class="success-message">
            ✓ {{ session('success') }}
        </div>
    @endif

    <!-- TOTAL KURSUS -->
    <div class="summary-card">
        <small>Total Kursus Terdaftar</small>
        <h2>{{ $courses->total() }}</h2>
    </div>

    <div class="table-card">

        <h3>Daftar Kursus</h3>

        <!-- PENCARIAN DAN FILTER -->
        <div class="filter-box">

            <form action="{{ route('courses.index') }}"
                  method="GET"
                  class="filter-form">

                <input
                    type="text"
                    name="q"
                    value="{{ $search }}"
                    placeholder="Cari kode atau nama kursus..."
                >

                <select name="status">

                    <option value="">Semua Status</option>

                    <option value="open"
                        {{ $status == 'open' ? 'selected' : '' }}>
                        Open
                    </option>

                    <option value="closed"
                        {{ $status == 'closed' ? 'selected' : '' }}>
                        Closed
                    </option>

                    <option value="draft"
                        {{ $status == 'draft' ? 'selected' : '' }}>
                        Draft
                    </option>

                </select>

                <button type="submit" class="btn-search">
                    Cari
                </button>

                <a href="{{ route('courses.index') }}" class="btn-reset">
                    Reset
                </a>

            </form>

        </div>

        <!-- INFORMASI HASIL -->
        <div class="result-info">
            Menampilkan {{ $courses->count() }} data pada halaman ini
            dari total {{ $courses->total() }} kursus.
        </div>

        <!-- TABEL KURSUS -->
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
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($courses as $course)

                    <tr>

                        <td>
                            {{ $courses->firstItem() + $loop->index }}
                        </td>

                        <td>
                            <strong>{{ $course->code }}</strong>
                        </td>

                        <td>
                            {{ $course->name }}
                        </td>

                        <td>
                            Rp {{ number_format($course->fee, 0, ',', '.') }}
                        </td>

                        <td>
                            {{ $course->quota }} peserta
                        </td>

                        <td>
                            {{ $course->start_date
                                ? \Carbon\Carbon::parse($course->start_date)->format('d-m-Y')
                                : '-' }}
                        </td>

                        <td>
                            <span class="status status-{{ $course->status }}">
                                {{ ucfirst($course->status) }}
                            </span>
                        </td>

                        <td>

                            <!-- DETAIL -->
                            <a href="{{ route('courses.show', $course->id) }}"
                               class="btn-detail">
                                Detail
                            </a>

                            <!-- EDIT -->
                            <a href="{{ route('courses.edit', $course->id) }}"
                               class="btn-edit">
                                Edit
                            </a>

                            <!-- HAPUS -->
                            <form action="{{ route('courses.destroy', $course) }}"
                                  method="POST"
                                  class="action-form"
                                  onsubmit="return confirm('Apakah kamu yakin ingin menghapus kursus ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-delete">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="8" class="empty-message">
                            <strong>Data Kursus Tidak Ditemukan</strong>
                            <br>
                            Silakan periksa kata kunci pencarian
                            atau pilihan status yang digunakan.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

        <!-- TOTAL DATA -->
        <div class="total-info">
            <span>Total Seluruh Kursus</span>
            <span>{{ $courses->total() }} Data</span>
        </div>

        <!-- PAGINATION -->
        <div class="pagination-wrapper">
            {{ $courses->links() }}
        </div>

    </div>

</div>

@endsection