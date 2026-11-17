TEST CASE PENGUJIAN
Praktikum Laravel Relational Database – KursusKu
1. Identitas Pengujian
Keterangan	Detail
Nama Proyek	KursusKu
Materi	Laravel Relational Database
Modul	Pertemuan 12
Fitur yang Diuji	Relasi Course, Participant, dan Enrollment
Tujuan	Memastikan relasi database, proses enrollment, validasi duplikasi, laporan, dan penghapusan data berjalan sesuai ketentuan praktikum.


2. Tabel Test Case
Seluruh skenario pengujian digabungkan dalam satu tabel agar mudah dibaca dan diisi. Kolom Hasil Aktual dan Status diisi setelah pengujian benar-benar dilakukan.
ID	Skenario Pengujian	Data / Langkah Pengujian	Hasil yang Diharapkan	Hasil Aktual	Status
TC-01	Menjalankan migration	Jalankan perintah php artisan migrate.	Tabel participants dan enrollments berhasil dibuat tanpa error.	Belum diuji	Belum diuji
TC-02	Memeriksa foreign key dan unique constraint	Periksa struktur tabel enrollments pada database.	Kolom participant_id dan course_id menjadi foreign key, serta pasangan keduanya tidak boleh terdaftar lebih dari satu kali.	Belum diuji	Belum diuji
TC-03	Memasukkan data participant	Tambahkan data Alya Rahma, Bima Putra, dan Citra Nabila.	Data participant tersimpan dan dapat ditampilkan.	Belum diuji	Belum diuji
TC-04	Membuka form enrollment	Buka halaman form enrollment.	Form tampil dengan pilihan participant dan course yang tersedia.	Belum diuji	Belum diuji
TC-05	Mengirim form tanpa memilih participant	Biarkan pilihan participant kosong, lalu kirim form.	Sistem menampilkan validasi bahwa participant wajib dipilih.	Belum diuji	Belum diuji
TC-06	Mengirim form tanpa memilih course	Pilih participant, tetapi biarkan course kosong, lalu kirim form.	Sistem menampilkan validasi bahwa course wajib dipilih.	Belum diuji	Belum diuji
TC-07	Menambahkan enrollment baru	Pilih Alya Rahma dan Laravel Dasar, kemudian kirim form.	Enrollment berhasil disimpan dengan status registered.	Belum diuji	Belum diuji
TC-08	Mencegah enrollment duplikat	Daftarkan kembali Alya Rahma pada Laravel Dasar.	Sistem menolak pendaftaran dan menampilkan pesan bahwa participant sudah terdaftar pada course tersebut.	Belum diuji	Belum diuji
TC-09	Participant mengikuti course berbeda	Daftarkan Alya Rahma pada PHP Dasar.	Enrollment berhasil disimpan karena course berbeda.	Belum diuji	Belum diuji
TC-10	Course diikuti participant berbeda	Daftarkan Bima Putra pada Laravel Dasar.	Enrollment berhasil disimpan karena participant berbeda.	Belum diuji	Belum diuji
TC-11	Menampilkan laporan enrollment	Buka halaman /enrollments.	Laporan menampilkan nama participant, nama course, tanggal mulai course, dan status enrollment.	Belum diuji	Belum diuji
TC-12	Memeriksa data enrollment di database	Periksa isi tabel enrollments melalui database.	Data enrollment yang berhasil dibuat tersimpan dengan participant_id, course_id, dan status yang sesuai.	Belum diuji	Belum diuji
TC-13	Menguji cascade delete pada Course	Gunakan data course uji, lalu hapus course tersebut.	Enrollment yang berelasi dengan course tersebut ikut terhapus, sedangkan data participant tetap ada.	Belum diuji	Belum diuji
TC-14	Menguji cascade delete pada Participant	Gunakan data participant uji, lalu hapus participant tersebut.	Enrollment yang berelasi dengan participant tersebut ikut terhapus, sedangkan data course tetap ada.	Belum diuji	Belum diuji


3. Data Uji
Jenis Data	Data yang Digunakan
Participant	Alya Rahma
Participant	Bima Putra
Participant	Citra Nabila
Course	Laravel Dasar
Course	PHP Dasar
Status awal enrollment	registered


4. Kesimpulan
Test case ini disusun untuk menguji fungsi relational database pada aplikasi KursusKu, mulai dari pembuatan tabel dan relasi, pengisian data participant, proses enrollment, validasi agar participant tidak terdaftar dua kali pada course yang sama, penampilan laporan, hingga pengujian cascade delete. Pengujian dinyatakan berhasil apabila hasil aktual sesuai dengan hasil yang diharapkan pada setiap skenario. Kolom hasil aktual dan status perlu dilengkapi berdasarkan pengujian yang benar-benar dilakukan.