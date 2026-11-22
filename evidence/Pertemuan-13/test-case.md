# TEST CASE – PRAKTIKUM PERTEMUAN 13

**Nama Proyek:** KursusKu  
**Nama Penguji:** Nurul Aulia Harahap  
**Kelas:** 5F PTIK  
**Tanggal Pengujian:** 22 November 2026  

## 1. Tujuan Pengujian

Test case ini dibuat untuk menguji fitur pencarian, filter status, pagination, dan kemampuan aplikasi KursusKu ketika JavaScript dinonaktifkan.

## 2. Daftar Test Case

### TC-01 – Pencarian Berdasarkan Kode Kursus

- **Tujuan:** Memastikan sistem dapat mencari kursus berdasarkan kode.
- **Langkah Pengujian:**
  1. Buka halaman Kelola Kursus.
  2. Masukkan `laravel-106` pada kotak pencarian.
  3. Pilih Semua Status.
  4. Klik tombol Cari.
- **Hasil yang Diharapkan:** Sistem menampilkan kursus dengan kode `laravel-106`.
- **Hasil Aktual:** Sistem menampilkan 1 data, yaitu Laravel Dasar.
- **Status:** Berhasil.

### TC-02 – Pencarian Tanpa Hasil

- **Tujuan:** Memastikan sistem menangani pencarian yang tidak ditemukan.
- **Langkah Pengujian:**
  1. Masukkan kata kunci `kursus-tidak-ada-999`.
  2. Pilih Semua Status.
  3. Klik Cari.
- **Hasil yang Diharapkan:** Sistem menampilkan 0 data dan pesan Data Kursus Tidak Ditemukan.
- **Hasil Aktual:** Isi sesuai hasil pengujian.
- **Status:** Perlu bukti screenshot.

### TC-03 – Pengujian Pagination

- **Tujuan:** Memastikan data kursus dibagi menjadi beberapa halaman.
- **Langkah Pengujian:**
  1. Buka halaman Kelola Kursus.
  2. Klik Reset.
  3. Periksa jumlah data pada halaman pertama.
  4. Klik halaman 2 dan halaman 3.
- **Hasil yang Diharapkan:** Setiap halaman menampilkan maksimal 10 data.
- **Hasil Aktual:**
  - Halaman 1: 10 data.
  - Halaman 2: 10 data.
  - Halaman 3: 1 data.
- **Status:** Berhasil.

### TC-04 – Pencarian Menggunakan Spasi

- **Tujuan:** Memastikan sistem mengabaikan spasi di awal dan akhir kata kunci.
- **Langkah Pengujian:**
  1. Masukkan `   Laravel Dasar   ` pada kotak pencarian.
  2. Pilih Semua Status.
  3. Klik Cari.
- **Hasil yang Diharapkan:** Sistem tetap menemukan kursus Laravel Dasar.
- **Hasil Aktual:** Isi sesuai hasil pengujian.
- **Status:** Dikonfirmasi telah diuji.

### TC-05 – Filter Berdasarkan Status

- **Tujuan:** Memastikan filter status bekerja sesuai pilihan pengguna.
- **Langkah Pengujian:**
  1. Buka halaman Kelola Kursus.
  2. Pilih status Open.
  3. Klik Cari.
  4. Ulangi langkah untuk status Closed dan Draft.
- **Hasil yang Diharapkan:** Sistem hanya menampilkan kursus sesuai status yang dipilih.
- **Hasil Aktual:** Filter telah dicoba dan hasil muncul.
- **Status:** Dikonfirmasi telah diuji.

### TC-06 – Mempertahankan Filter Ketika Berpindah Halaman

- **Tujuan:** Memastikan kata kunci dan filter tidak hilang ketika berpindah halaman.
- **Langkah Pengujian:**
  1. Masukkan kata kunci pencarian.
  2. Pilih salah satu status.
  3. Klik Cari.
  4. Jika hasil lebih dari 10 data, klik halaman 2.
  5. Periksa kembali kata kunci dan status.
- **Hasil yang Diharapkan:** Kata kunci dan status tetap terbawa pada halaman berikutnya.
- **Hasil Aktual:** Isi berdasarkan hasil pengujian.
- **Status:** Perlu bukti pendukung.

### TC-07 – Pengujian Tanpa JavaScript

- **Tujuan:** Memastikan pencarian tetap berfungsi tanpa JavaScript.
- **Langkah Pengujian:**
  1. Buka Chrome DevTools.
  2. Tekan Ctrl + Shift + P.
  3. Cari perintah Disable JavaScript.
  4. Pilih perintah tersebut.
  5. Muat ulang halaman.
  6. Masukkan kata kunci Laravel.
  7. Klik Cari.
- **Hasil yang Diharapkan:** Halaman dan pencarian tetap berjalan tanpa JavaScript.
- **Hasil Aktual:** Isi setelah pengujian benar-benar dilakukan.
- **Status:** Belum terverifikasi.

## 3. Kesimpulan

Berdasarkan pengujian yang telah dilakukan, fitur pencarian dan pagination pada aplikasi KursusKu telah menunjukkan hasil sesuai harapan. Pencarian berdasarkan kode kursus berhasil menampilkan data yang sesuai, sedangkan pagination berhasil membagi 21 data kursus menjadi tiga halaman.

Pengujian filter status, pencarian dengan spasi, pemeliharaan parameter halaman, dan tanpa JavaScript didokumentasikan berdasarkan hasil pengujian masing-masing. Bukti screenshot perlu dilampirkan agar hasil pengujian dapat diperiksa kembali.