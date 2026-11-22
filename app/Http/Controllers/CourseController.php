<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Menampilkan data kursus dengan fitur pencarian, filter, dan pagination
    public function index(Request $request)
    {
        // Membuat query awal untuk mengambil data kursus
        $query = Course::query();

        // Mengambil kata kunci pencarian
        $search = trim($request->input('q', ''));

        // Pencarian berdasarkan kode atau nama kursus
        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('code', 'like', '%' . $search . '%')
                  ->orWhere('name', 'like', '%' . $search . '%');
            });
        }

        // Mengambil status yang dipilih
        $status = $request->input('status', '');

        // Filter berdasarkan status kursus
        if (in_array($status, ['open', 'closed', 'draft'])) {
            $query->where('status', $status);
        }

        // Menampilkan 10 data kursus setiap halaman
        // withQueryString() mempertahankan pencarian dan filter saat pindah halaman
        $courses = $query->latest()
                         ->paginate(10)
                         ->withQueryString();

        // Mengirim data ke halaman daftar kursus
        return view('courses.index', compact(
            'courses',
            'search',
            'status'
        ));
    }

    // Menampilkan halaman tambah kursus
    public function create()
    {
        return view('courses.create');
    }

    // Menyimpan data kursus baru
    public function store(StoreCourseRequest $request)
    {
        Course::create($request->validated());

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil ditambahkan.');
    }

    // Menampilkan detail kursus
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // Menampilkan halaman edit kursus
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // Memperbarui data kursus
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return to_route('courses.show', $course)
            ->with('success', 'Kursus berhasil diperbarui.');
    }

    // Menghapus data kursus
    public function destroy(Course $course)
    {
        $course->delete();

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil dihapus.');
    }
}