AI USAGE LOG
Proyek KursusKu – Praktikum Laravel Relational Database
1. Identitas Proyek
Keterangan	Informasi
Nama Proyek	KursusKu
Teknologi	Laravel, PHP, Blade, dan database relasional
Materi Praktikum	Relational Database
Dokumen	AI Usage Log
Tanggal Pencatatan	17 November 2026


2. Tujuan Penggunaan AI
AI (ChatGPT) digunakan sebagai alat bantu selama pengerjaan proyek KursusKu. Penggunaan AI bertujuan membantu memahami materi, memberikan arahan pemrograman, membantu menemukan kesalahan, serta menyusun dokumentasi pengujian. AI digunakan sebagai pendamping; kode dan hasil yang diberikan tetap perlu diperiksa, disesuaikan, dan diuji pada proyek.
3. Catatan Penggunaan AI
No.	Kegiatan	Bantuan AI yang Digunakan	Penerapan pada Proyek
1	Memahami relasi database	Meminta penjelasan mengenai hubungan antara Course, Participant, dan Enrollment.	Menjadi acuan untuk memahami relasi data course dan participant melalui tabel enrollment.
2	Membuat dan memeriksa kode controller	Meminta bantuan memahami serta menyusun kode EnrollmentController.php.	Kode digunakan sebagai acuan untuk menampilkan form enrollment, mengambil data participant dan course, serta menyimpan enrollment.
3	Membuat tampilan form	Meminta bantuan menyusun kode tampilan create.blade.php.	Menjadi acuan dalam membuat form pemilihan participant dan course.
4	Validasi enrollment	Meminta bantuan menerapkan validasi agar participant tidak mendaftar dua kali pada course yang sama.	Menambahkan pemeriksaan data enrollment dan menampilkan pesan ketika pendaftaran duplikat dilakukan.
5	Menampilkan pesan validasi	Meminta bantuan menempatkan pesan kesalahan pada tampilan form enrollment.	Pesan validasi ditampilkan pada halaman form ketika participant sudah terdaftar pada course yang dipilih.
6	Pengujian aplikasi	Meminta bantuan menyusun skenario test case berdasarkan fitur yang dikerjakan.	Menyusun skenario pengujian migration, relasi, form, validasi, penyimpanan, laporan, dan cascade delete.
7	Dokumentasi pengujian	Meminta bantuan menggabungkan test case ke dalam format tabel serta membuat kesimpulan.	Menghasilkan dokumen test case sebagai panduan pencatatan hasil pengujian.


4. Contoh Bentuk Bantuan / Prompt
Berikut ringkasan permintaan yang digunakan selama pengerjaan:
1. Meminta penjelasan mengenai relasi antara tabel Course, Participant, dan Enrollment pada Laravel.
2. Meminta pemeriksaan dan penyusunan kode lengkap EnrollmentController.php.
3. Meminta penyusunan kode lengkap create.blade.php untuk form enrollment.
4. Meminta bantuan menampilkan pesan bahwa participant sudah terdaftar pada course yang dipilih.
5. Meminta penyusunan test case dalam bentuk tabel berdasarkan fitur pada proyek KursusKu.
5. Pemeriksaan dan Tanggung Jawab Pengguna
Hasil bantuan AI tidak langsung dianggap benar atau otomatis berhasil. Setiap kode perlu disesuaikan dengan struktur proyek, nama tabel, model, route, dan versi Laravel yang digunakan. Pengguna bertanggung jawab untuk:
- Memeriksa kembali kode sebelum digunakan.
- Menjalankan aplikasi dan perintah yang diperlukan.
- Menguji setiap fitur pada proyek.
- Memastikan hasil aktual sesuai dengan hasil yang diharapkan.
- Memperbaiki kode apabila ditemukan kesalahan.
- Mengisi hasil dan status test case berdasarkan pengujian yang benar-benar dilakukan.
6. Kesimpulan
ChatGPT digunakan sebagai alat bantu dalam proses pengerjaan proyek KursusKu, terutama untuk memahami relasi database, menyusun dan memeriksa kode enrollment, menangani validasi pendaftaran ganda, serta membuat dokumentasi pengujian. Penggunaan AI membantu memberikan arahan dan memperjelas langkah pengerjaan. Namun, ketepatan kode dan keberhasilan fitur tetap harus dipastikan melalui pemeriksaan serta pengujian langsung pada aplikasi.
Catatan: Dokumen ini merupakan ringkasan penggunaan AI berdasarkan kegiatan pengerjaan yang tercatat. Sesuaikan kembali apabila terdapat kegiatan, prompt, atau bantuan lain yang benar-benar digunakan tetapi belum tercantum di sini.