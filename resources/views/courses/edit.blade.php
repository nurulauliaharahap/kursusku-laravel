@extends('layouts.app')

@section('title', 'Edit Kursus - KursusKu')

@section('content')
<div class="container py-3">
    <div class="card border-0 shadow-sm">
        <div class="card-header text-white" style="background-color: #198754;">
            <h5 class="mb-0">Edit Data Kursus</h5>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Periksa kembali data yang diisi.</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kode Kursus</label>
                        <input type="text" name="code" class="form-control"
                            value="{{ old('code', $course->code) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Kursus</label>
                        <input type="text" name="name" class="form-control"
                            value="{{ old('name', $course->name) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Biaya Kursus</label>
                        <input type="number" name="fee" class="form-control"
                            value="{{ old('fee', $course->fee) }}" min="0" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kuota</label>
                        <input type="number" name="quota" class="form-control"
                            value="{{ old('quota', $course->quota) }}" min="1" max="500" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" name="start_date" class="form-control"
                            value="{{ old('start_date', $course->start_date->format('Y-m-d')) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="draft" {{ old('status', $course->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="open" {{ old('status', $course->status) == 'open' ? 'selected' : '' }}>Dibuka</option>
                            <option value="closed" {{ old('status', $course->status) == 'closed' ? 'selected' : '' }}>Ditutup</option>
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="2">{{ old('description', $course->description) }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan Perubahan
                </button>

                <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection