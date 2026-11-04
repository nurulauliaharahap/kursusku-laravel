TEST MATRIX – KURSUSKU

Praktikum Pertemuan 10

A. Tabel Pengujian

No.| Fitur yang Diuji| Skenario Pengujian| Hasil yang Diharapkan| Hasil Aktual| Status
1| Menampilkan Data Kursus| Membuka halaman "/courses"| Sistem menampilkan daftar kursus yang tersimpan di database| Data kursus berhasil ditampilkan| PASS
2| Menambahkan Data Kursus| Mengisi formulir dengan data kursus yang valid| Sistem menyimpan data kursus ke database| Data kursus berhasil ditambahkan| PASS
3| Validasi Kode Kosong| Mengosongkan kolom kode kursus| Sistem menampilkan pesan bahwa kode wajib diisi| Pesan validasi berhasil ditampilkan| PASS
4| Validasi Kode Duplikat| Memasukkan kode kursus yang sudah terdaftar, yaitu WEB-101| Sistem menolak kode yang sudah digunakan| Kode duplikat berhasil ditolak| PASS
5| Validasi Biaya Negatif| Memasukkan nilai biaya negatif| Sistem menolak nilai biaya yang tidak valid| Browser berhasil menolak biaya negatif melalui validasi input| PASS
6| Validasi Nama Kursus Kosong| Mengosongkan kolom nama kursus| Sistem menampilkan pesan bahwa nama kursus wajib diisi| Pesan validasi berhasil ditampilkan| PASS
7| Validasi Kuota Nol| Memasukkan nilai kuota 0| Sistem menolak kuota yang kurang dari 1| Kuota 0 berhasil ditolak| PASS
8| Validasi Status Tidak Valid| Memasukkan status selain draft, open, atau closed| Sistem menolak status yang tidak sesuai ketentuan| Pesan validasi status berhasil ditampilkan| PASS

B. Keterangan

- PASS: Pengujian berhasil dan sesuai dengan hasil yang diharapkan.
- FAIL: Pengujian tidak berhasil atau tidak sesuai dengan hasil yang diharapkan.

C. Rekapitulasi Pengujian

- Jumlah pengujian: 8
- Pengujian berhasil (PASS): 8
- Pengujian gagal (FAIL): 0

D. Kesimpulan

Berdasarkan hasil pengujian yang telah dilakukan, fitur pengelolaan data kursus pada aplikasi KursusKu telah berjalan sesuai dengan hasil yang diharapkan. Pengujian meliputi menampilkan data kursus, menambahkan data kursus, serta validasi terhadap kode kursus, nama kursus, biaya, kuota, dan status kursus.

Data kursus yang valid berhasil disimpan ke database, sedangkan data yang tidak memenuhi ketentuan berhasil ditolak melalui proses validasi. Dengan demikian, fitur Create dan Read serta validasi input pada Praktikum Pertemuan 10 telah berhasil diuji.