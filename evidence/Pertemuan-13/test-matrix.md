# TEST MATRIX – PRAKTIKUM PERTEMUAN 13

**Nama Proyek:** KursusKu  
**Fitur yang Diuji:** Searching, Filtering, dan Pagination  
**Tanggal Pengujian:** 22 November 2026  
**Nama Penguji:** Nurul Aulia Harahap  
**Kelas:** 5F PTIK  

## A. Tujuan Pengujian

Pengujian ini dilakukan untuk memastikan fitur pencarian, filter status, dan pagination pada aplikasi KursusKu berjalan dengan baik. Selain itu, pengujian dilakukan untuk memastikan sistem dapat mempertahankan kata kunci dan filter ketika berpindah halaman serta tetap dapat digunakan tanpa JavaScript.

## B. Tabel Pengujian

| ID | Skenario Pengujian | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|
| TM-01 | Pencarian berdasarkan kode kursus `laravel-106` | Sistem menampilkan satu kursus yang sesuai. | Menampilkan 1 data, yaitu Laravel Dasar. | Berhasil |
| TM-02 | Pencarian dengan kata kunci yang tidak tersedia | Sistem menampilkan 0 data dan pesan data tidak ditemukan. | Diisi berdasarkan hasil pengujian dan screenshot. | Perlu bukti |
| TM-03 | Menampilkan lebih dari 10 data | Sistem menampilkan data menggunakan pagination. | Total 21 data terbagi menjadi 10, 10, dan 1 data. | Berhasil |
| TM-04 | Pencarian menggunakan kata kunci dengan spasi | Sistem mengabaikan spasi di awal dan akhir kata kunci. | Telah diuji berdasarkan konfirmasi pengguna. | Dikonfirmasi |
| TM-05 | Filter berdasarkan status Open, Closed, dan Draft | Sistem hanya menampilkan kursus sesuai status yang dipilih. | Filter status telah dicoba dan hasil muncul. | Dikonfirmasi |
| TM-06 | Mempertahankan pencarian dan filter ketika berpindah halaman | Kata kunci dan status tetap terbawa pada halaman berikutnya. | Diisi berdasarkan hasil pengujian dan screenshot. | Perlu bukti |
| TM-07 | Pengujian tanpa JavaScript | Pencarian dan halaman tetap berjalan tanpa JavaScript. | Belum ada bukti pencarian saat JavaScript benar-benar nonaktif. | Belum terverifikasi |

## C. Hasil Pengujian Pagination

Jumlah data kursus yang tersedia setelah penambahan data adalah 21 kursus.

Pembagian data pada pagination:

- Halaman 1: 10 data kursus.
- Halaman 2: 10 data kursus.
- Halaman 3: 1 data kursus.

Hasil tersebut menunjukkan bahwa fitur pagination dapat membagi data kursus menjadi beberapa halaman dengan batas 10 data pada setiap halaman.

## D. Daftar Bukti Screenshot

1. `01-tampilan-kelola-kursus.png` – Tampilan halaman Kelola KursusKu.
2. `02-pencarian-satu-hasil.png` – Hasil pencarian satu kursus.
3. `03-pencarian-nol-hasil.png` – Hasil pencarian tanpa data.
4. `04-filter-open.png` – Hasil filter status Open.
5. `05-filter-closed.png` – Hasil filter status Closed.
6. `06-filter-draft.png` – Hasil filter status Draft.
7. `07-pagination-halaman-1.png` – Tampilan halaman pertama.
8. `08-pagination-halaman-2.png` – Tampilan halaman kedua.
9. `09-pagination-halaman-3.png` – Tampilan halaman ketiga.
10. `10-keyword-dengan-spasi.png` – Pengujian kata kunci dengan spasi.
11. `11-filter-dan-pencarian-halaman-2.png` – Pengujian parameter saat berpindah halaman.
12. `12-pengujian-tanpa-javascript.png` – Pengujian aplikasi tanpa JavaScript.

## E. Kesimpulan

Berdasarkan pengujian yang telah dilakukan, fitur pencarian dan pagination pada aplikasi KursusKu telah berjalan sesuai hasil yang diamati. Pencarian berdasarkan kode kursus berhasil menampilkan data yang sesuai. Pagination juga berhasil membagi 21 data kursus menjadi tiga halaman, yaitu 10 data, 10 data, dan 1 data.

Fitur filter status dan pencarian dengan kata kunci yang memiliki spasi juga telah dicoba. Pengujian tanpa JavaScript masih perlu dipastikan dengan bukti ketika JavaScript benar-benar dinonaktifkan.

Dengan demikian, test matrix ini digunakan sebagai dokumentasi pengujian fitur pada Praktikum Pertemuan 13.