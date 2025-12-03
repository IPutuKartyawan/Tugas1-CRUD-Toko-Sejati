// Nama : I Putu Kartyawan
// NIM : 240030194
// Matkul : Pengembangan Sistem Backend

# Sistem CRUD Produk Toko Segar Sejati

Aplikasi ini merupakan sistem backend sederhana yang digunakan untuk mengelola data produk pada sebuah toko/warung.
Pengguna dapat melakukan operasi CRUD:
- Menambah produk
- Melihat daftar produk
- Mengubah produk
- Menghapus produk
- Upload dan menampilkan gambar produk

# 1. Deskripsi Aplikasi
Aplikasi ini menggunakan entitas Produk.
Aplikasi ini berfungsi untuk mengelola data produk pada sebuah toko/warung. Fitur lengkap:

- Create : Tambah data produk baru + upload gambar.
- Read   : Menampilkan seluruh produk dalam tabel dengan tampilan yang rapi.
- Update : Mengubah data produk yang sudah ada.
- Delete : Menghapus data tertentu.
- Upload gambar : File gambar disimpan pada folder `public/uploads`.

# 2. Spesifikasi Teknis
Teknologi yang Digunakan
- PHP :versi 8.4 
- DBMS : MySQL / MariaDB  
- Web Server : PHP Built-in Server   

#Penjelasan Class Utama

# 1. Database.php
Bertanggung jawab untuk:
- Membuat koneksi ke MySQL menggunakan PDO
- Menyimpan konfigurasi host, user, password, dan nama database
- Digunakan oleh repository untuk query ke database

# 2. ProductRepository.php
Berisi logika CRUD utama:
- `getAll()` — mengambil semua produk
- `getById($id)` — mengambil data 1 produk
- `create($data)` — tambah produk baru
- `update($id, $data)` — update produk
- `delete($id)` — hapus produk
- Mengatur upload gambar
Class ini menjadi penghubung antara database dan halaman PHP (index, create, edit).

# 3. Instruksi Menjalankan Aplikasi
3.1. Import Basis Data (`schema.sql`)
1. Buka MySQL Workbench / phpMyAdmin.
2. Buat database:

3.2. Atur Konfigurasi Koneksi Database
src/Database.php

    private $host = "localhost";
    private $db   = "produk_crud";
    private $user = "root";
    private $pass = "123";

3.3. Menjalankan Aplikasi
a. Masuk ke folder Public :
    C:\Users\ASUS\Documents\Aplikasi Backend sederhana\Produk_backend
b. Jalankan Server dengan : 
    php -S localhost:8000 -t public
c. URL utama untuk mengakses aplikasi :
    http://localhost:8000

# Contoh Skenario Uji Singkat

1. Tambah 1 Data Produk
Klik tombol Tambah Produk
Isi form:
    Nama produk: “Roti Tawar Gandum”
    Kategori: Makanan
    Harga: 18000
    Stok: 40
    Status: active
    Upload gambar
Klik Simpan
Data tampil pada halaman utama

2. Tampilkan Daftar Data
Buka halaman utama index.php
Produk yang baru ditambahkan muncul di tabel
Gambar akan tampil jika file berhasil di-upload

3. Ubah Data Tertentu
Klik tombol Edit pada salah satu produk
Ubah:
    Harga
    Stok
    Nama produk, dsb.
Klik Update
Perubahan muncul di tabel

4. Hapus Data
Klik Hapus
Sistem akan meminta konfirmasi
Setelah klik OK, Produk terhapus dari database