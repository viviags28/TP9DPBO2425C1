# Janji
Saya Vivi Agustina Suryana dengan NIM 2400456 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek Untuk keberkahan-Nya, maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan.

# Deskripsi
Aplikasi ini adalah sistem sederhana untuk mengelola data Pembalap dan Balapan dengan konsep MVP (Model–View–Presenter).
Pengguna dapat melakukan:
- Melihat daftar pembalap
- Menambah, mengubah, menghapus pembalap
- Melihat daftar balapan
- Menambah, mengubah, menghapus balapan
Semua aktivitas CRUD dilakukan melalui antarmuka web

# Desain Program

## Arsitektur Program: MVP

Aplikasi dibangun menggunakan pola MVP:
a. Model
- Model bertugas untuk:
- Terhubung dengan database
- Mengambil data
- Menyimpan data
- Mengubah/menghapus data
- Model tidak mengerti tampilan — hanya bekerja dengan database.
b. View
- View bertugas:
- Menampilkan UI (HTML template)
- Menampilkan daftar data
- Menampilkan form tambah/ubah
- Mengisi template dengan data yang diberikan Presenter
- View tidak mengolah data, hanya menampilkan.
c. Presenter
- Presenter adalah “otak” aplikasi:
- Mengambil data dari Model
- Menyiapkan data untuk View
- Menjalankan logika CRUD
- Mengatur navigasi (add/edit/delete)
- Presenter tidak menampilkan HTML, hanya mengirimkan data ke View.

## Alur Program
1. User membuka halaman
  → Browser memanggil index.php
  → Program menentukan pengguna sedang memilih Pembalap atau Balapan
2. Index memilih Presenter yang sesuai
- Jika user memilih menu pembalap → PresenterPembalap dipanggil
- Jika user memilih menu balapan → PresenterBalapan dipanggil
- Presenter ini yang nantinya mengarahkan semua proses.
3. Proses Menampilkan Data (READ)
  Presenter:
  - meminta Model mengambil semua data dari database
  - mengirimkan data ke View
  - View menampilkan tabel menggunakan template HTML
4. Proses Menambah Data (CREATE)
User menekan tombol Tambah → Presenter memanggil View Form → User mengisi form → Presenter menerima data → Presenter memerintahkan Model untuk menyimpan ke database → Halaman kembali ke daftar.
5. Proses Mengubah Data (UPDATE)
User menekan tombol Edit → Presenter mengambil data tertentu → Presenter menampilkan form dengan data tersebut → User mengubah → Presenter mengirimkan perubahan ke Model → Database diperbarui → Kembali ke daftar.
6. Proses Menghapus Data (DELETE)
User menekan tombol Hapus → Presenter memerintahkan Model menghapus dari database → Halaman diperbarui untuk menampilkan daftar terbaru.

## Database
Terdapat dua tabel utama:
1. pembalap
   Berisi data:
   - nama
   - tim
   - negara
   - poin musim
   - jumlah menang
2. balapan
   Berisi data:
   - nama balapan
   - lokasi
   - tanggal
Presenter dan Model masing-masing mengatur tabel miliknya.

# Dokumentasi

## Tampilan Awal Tabel Pembalap

<img width="1366" height="768" alt="1  Tampilan awaltabel pembalap" src="https://github.com/user-attachments/assets/089fb0a9-d1ab-43ea-9e8e-ceeac04568a3" />


## Tampilan Awal Tabel Balapan


<img width="1366" height="768" alt="2  Tampilan awal tabel balapan" src="https://github.com/user-attachments/assets/a0f870ee-dc23-4b39-8b65-0d9afdf0b3a3" />



## Tampilan Full simulasi CRUD


https://github.com/user-attachments/assets/4379d4f7-43d6-4ae1-b707-32cd18a660e0

