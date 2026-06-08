# SIPAMAS – Sistem Pelaporan Masyarakat

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

Repository ini merupakan tugas **UAS Pemrograman API** untuk membangun aplikasi web pelaporan masalah masyarakat terintegrasi yang terdiri dari **REST API Backend** dan **Frontend Single Page Application (SPA)** yang dinamis serta modern.

---

## 👥 Informasi Kelompok

**Kelompok 6 - Kelas 2024E**
Program Studi D4 Teknik Informatika  
Universitas Negeri Surabaya

| Nama Anggota | NIM | Peran / Kontribusi |
| :--- | :--- | :--- |
| **Berliana Nidia Meiningrum** | 24091397142 | Perancang Database, Migrasi & Seeder, Manajemen Model |
| **Frysa Nayla Ayu** | 24091397162 | Pengembangan REST API Controller, Integrasi JWT & Swagger, Testing API |
| **Nabila Firdausi Farsa** | 24091397166 | Pengembangan UI/UX Frontend, Styling CSS Kustom, Penanganan Fetch API |

---

## 🛠️ Tech Stack & Spesifikasi

* **Backend Framework**: Laravel 12 (PHP 8.2+)
* **Database**: MySQL (via XAMPP)
* **Autentikasi**: JWT (JSON Web Token) menggunakan `php-open-source-saver/jwt-auth`
* **Dokumentasi API**: Swagger / OpenAPI 3.0 menggunakan `darkaonline/l5-swagger`
* **Frontend**: HTML5, Vanilla JS (Fetch API), dan CSS Kustom (bertema Biru `#2F4156`, Beige `#F5EFEB`, Putih `#FFFFFF`, dan Hitam `#000000`)
* **Pengujian**: Postman Collection (disertakan berkas `SIPAMAS.postman_collection.json`)

---

## 🚀 Fitur Utama Aplikasi

1. **Autentikasi JWT**:
   - Registrasi warga baru.
   - Login untuk mendapatkan token JWT (token otomatis valid selama 1 jam).
   - Logout untuk menonaktifkan token (token otomatis di-blacklist oleh sistem).
2. **Kelola Profil Warga**:
   - Melihat profil diri sendiri yang sedang login.
   - Mengubah nama, email, dan nomor telepon.
3. **Pengaduan Pengguna (Laporan)**:
   - Membuat pengaduan aduan baru dilengkapi pilihan kategori dinamis, wilayah, lokasi detail, deskripsi detail, serta unggah berkas foto bukti (maksimal 2MB, JPG/PNG).
   - Melihat riwayat aduan yang pernah dibuat oleh akun pribadi.
   - Membatalkan/menghapus aduan sendiri yang masih berstatus *Menunggu Verifikasi*.
4. **Beranda Publik (Terbuka & Transparan)**:
   - Melihat daftar seluruh laporan yang diadukan masyarakat secara real-time.
   - Fitur pencarian laporan berbasis kata kunci (judul/deskripsi/wilayah).
   - Fitur filter laporan berdasarkan kategori.
   - Statistik dashboard: Total Laporan, Laporan Diproses, dan Laporan Selesai Ditangani.

---

## 📦 Daftar Endpoint API

### 🔐 Authentication (Public & Protected)
* `POST /api/register` - Registrasi warga baru (Public)
* `POST /api/login` - Masuk akun untuk mendapatkan JWT token (Public)
* `POST /api/logout` - Keluar akun dan invalidasi token (Protected)

### 👤 Profile (Protected)
* `GET /api/profile` - Melihat profil akun sendiri
* `PUT /api/profile` - Mengupdate data profil (nama, email, phone)

### 📋 Laporan Aduan (Protected)
* `POST /api/reports` - Membuat aduan baru (mendukung upload file `evidence_photo`)
* `GET /api/reports` - Melihat seluruh daftar laporan publik
* `GET /api/reports/{id}` - Melihat detail lengkap laporan berdasarkan ID
* `DELETE /api/reports/{id}` - Menghapus laporan sendiri (hanya yang berstatus *Menunggu Verifikasi*)
* `GET /api/reports/{id}/status` - Mengecek status terkini dari laporan tertentu

### 📁 Histori & Pendukung (Protected)
* `GET /api/my-reports` - Melihat daftar laporan milik sendiri
* `GET /api/my-reports/{id}` - Melihat detail laporan milik sendiri
* `GET /api/categories` - Mengambil daftar seluruh kategori aduan
* `GET /api/statuses` - Mengambil daftar seluruh status penanganan aduan

---

## 💻 Cara Menjalankan Proyek secara Lokal

### 1. Prasyarat
* PHP >= 8.2
* MySQL (XAMPP)
* Composer terinstall

### 2. Langkah Instalasi
1. Clone repository ini ke direktori lokal Anda.
2. Buka terminal di folder proyek (`sipamas`) lalu install dependensi composer:
   ```bash
   composer install
   ```
3. Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
4. Sesuaikan konfigurasi database pada file `.env` (sesuaikan nama database, username, dan password MySQL Anda). Pastikan pengaturan driver menggunakan `file` untuk session & cache:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sipamas
   DB_USERNAME=root
   DB_PASSWORD=

   SESSION_DRIVER=file
   CACHE_STORE=file
   ```
5. Generate application key:
   ```bash
   php artisan key:generate
   ```
6. Generate JWT secret key:
   ```bash
   php artisan jwt:secret
   ```
7. Jalankan migrasi tabel beserta data awal (*seeding*):
   ```bash
   php artisan migrate --seed
   ```
8. Buat link tautan untuk penyimpanan foto laporan:
   ```bash
   php artisan storage:link
   ```
9. Jalankan server lokal:
   ```bash
   php artisan serve
   ```
10. Buka browser Anda dan akses aplikasi web di alamat **`http://localhost:8000/`**.

---

## 🧪 Panduan Pengujian API

### A. Menggunakan Swagger UI (Dokumentasi Interaktif)
1. Akses halaman dokumentasi di: **`http://localhost:8000/api/documentation`**
2. Lakukan login via `POST /api/login` untuk mendapatkan token.
3. Klik tombol hijau **Authorize** di sudut kanan atas halaman Swagger.
4. Masukkan value dengan format: `Bearer <KODE_TOKEN_ANDA>` lalu klik Authorize.
5. Anda sekarang dapat mencoba seluruh endpoint yang dilindungi.

### B. Menggunakan Postman
1. Buka aplikasi **Postman**.
2. Klik **Import** lalu unggah berkas **`SIPAMAS.postman_collection.json`** yang terletak di root folder proyek ini.
3. Jalankan request **Login** terlebih dahulu. Skrip otomatis di dalam Postman akan langsung menangkap token hasil login dan menyimpannya di variabel `{{token}}`.
4. Anda dapat langsung menjalankan request lain (seperti *Get Profile*, *Buat Laporan*, dll.) tanpa perlu menyalin token secara manual.
