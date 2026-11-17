<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class EnrollmentController extends Controller
{
    // Menampilkan form enrollment
    public function create()
    {
        // Mengambil seluruh data peserta
        $participants = Participant::orderBy('name')->get();

        // Mengambil kursus yang masih berstatus open
        $courses = Course::where('status', 'open')
            ->orderBy('name')
            ->get();

        // Menampilkan halaman form enrollment
        return view('enrollments.create', compact(
            'participants',
            'courses'
        ));
    }


    // Menyimpan data enrollment
    public function store(Request $request)
    {
        // Validasi data pendaftaran
        $data = $request->validate([

            'participant_id' => [
                'nullable',
                'required_without:participant_name',
                'exists:participants,id',
            ],

            'participant_name' => [
                'nullable',
                'required_without:participant_id',
                'string',
                'max:255',
            ],

            'participant_email' => [
                'nullable',
                'required_with:participant_name',
                'email',
                'max:255',
                Rule::unique('participants', 'email'),
            ],

            'course_id' => [
                'required',
                'exists:courses,id',
            ],

        ], [

            'participant_id.required_without' =>
                'Silakan pilih peserta atau tambahkan peserta baru.',

            'participant_id.exists' =>
                'Data peserta tidak ditemukan.',

            'participant_name.required_without' =>
                'Nama peserta wajib diisi.',

            'participant_name.max' =>
                'Nama peserta maksimal 255 karakter.',

            'participant_email.required_with' =>
                'Email peserta wajib diisi.',

            'participant_email.email' =>
                'Format email tidak valid.',

            'participant_email.unique' =>
                'Email tersebut sudah terdaftar.',

            'course_id.required' =>
                'Silakan pilih kursus terlebih dahulu.',

            'course_id.exists' =>
                'Data kursus tidak ditemukan.',

        ]);


        // Memproses data peserta dan enrollment
        DB::transaction(function () use ($data) {

            // Memilih peserta lama
            if (!empty($data['participant_id'])) {

                $participantId = $data['participant_id'];

            } else {

                // Menambahkan peserta baru
                $participant = Participant::create([

                    'name' => $data['participant_name'],

                    'email' => $data['participant_email'],

                ]);

                $participantId = $participant->id;
            }


            // Memeriksa pendaftaran ganda
            $alreadyRegistered = Enrollment::where(
                'participant_id',
                $participantId
            )
                ->where('course_id', $data['course_id'])
                ->exists();


            // Jika peserta sudah terdaftar
            if ($alreadyRegistered) {

                throw ValidationException::withMessages([

                    'course_id' =>
                        'Peserta ini sudah terdaftar pada kursus tersebut.',

                ]);

            }


            // Menyimpan data enrollment
            Enrollment::create([

                'participant_id' => $participantId,

                'course_id' => $data['course_id'],

                'status' => 'registered',

            ]);

        });


        // Kembali ke halaman laporan jika berhasil
        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Enrollment berhasil ditambahkan!');
    }


    // Menampilkan laporan enrollment
    public function index()
    {
        // Mengambil data enrollment beserta relasinya
        $enrollments = Enrollment::with([
            'participant',
            'course'
        ])
            ->latest()
            ->get();

        // Menampilkan halaman laporan enrollment
        return view('enrollments.index', compact(
            'enrollments'
        ));
    }
}