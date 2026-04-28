# Portal Resmi Pemerintah Kabupaten Karanganyar

Website Portal Resmi Pemerintah Kabupaten Karanganyar yang dibangun menggunakan **Laravel 10** dan **Bootstrap 5**. Platform ini berfungsi sebagai pusat informasi, layanan publik, berita daerah, dan integrasi data antar instansi di lingkungan Kabupaten Karanganyar.

---

## 📸 Screenshot Tampilan Aplikasi

### 1. Tampilan Pengunjung (Frontend)
*(Simpan screenshot tampilan beranda pengunjung dengan nama file `home-desktop.png` ke dalam folder `docs/screenshots/`)*
![Beranda Portal](docs/screenshots/home-desktop.png)

*(Simpan screenshot tampilan mobile dengan nama file `home-mobile.png` ke dalam folder `docs/screenshots/`)*
![Beranda Mobile](docs/screenshots/home-mobile.png)

### 2. Tampilan Dashboard Admin (Backend)
*(Simpan screenshot dashboard admin dengan nama file `admin-dashboard.png` ke dalam folder `docs/screenshots/`)*
![Admin Dashboard](docs/screenshots/admin-dashboard.png)

*(Simpan screenshot kelola menu link dengan nama file `admin-menu-links.png` ke dalam folder `docs/screenshots/`)*
![Kelola Link Menu](docs/screenshots/admin-menu-links.png)

---

## ✨ Fitur Utama

### 🌐 Frontend (Halaman Publik)
- **Desain Modern & Responsif**: Tampilan antarmuka yang elegan menggunakan Bootstrap 5, disesuaikan untuk perangkat Desktop, Tablet, dan Mobile.
- **Berita Otomatis (Web Scraping)**: Fitur berita yang dilengkapi dengan *Open Graph (OG) Image Scraper* via cURL untuk menarik *thumbnail* berita asli secara otomatis.
- **Navigasi Dinamis**: Menu dropdown "Perangkat Daerah", "Data", dan "Aduan" yang kontennya diatur langsung dari *Database* (tidak di-hardcode).
- **GPR Widget Kominfo**: Terintegrasi langsung dengan widget Government Public Relations (GPR) dari Kominfo pusat.

### 🛡️ Backend (Admin Dashboard)
- **Sistem Autentikasi Super Aman**:
  - *No-Cache Headers Middleware* (mencegah bypass login via tombol *Back* browser).
  - *Logout On Public Pages Middleware* (sesi admin otomatis ditutup jika mengunjungi halaman publik).
- **Manajemen Berita (CRUD)**: Kelola judul berita, deskripsi, dan link sumber. Gambar thumbnail ditarik secara otomatis.
- **Manajemen Menu Navbar (Dynamic Links)**: Kelola link navigasi di halaman pengunjung (Eksternal/Internal) langsung dari panel admin.
- **Manajemen Pengguna (User Approval)**: Sistem registrasi bertahap. Akun yang baru mendaftar (*Editor*) wajib di- *Approve* oleh *Administrator*.

---

## 🛠️ Teknologi yang Digunakan

*   **Framework**: Laravel 10 (PHP 8.2+)
*   **Database**: MySQL (via Laragon)
*   **Frontend**: Bootstrap 5.3, Vanilla CSS
*   **Fitur Spesial**: PHP cURL (untuk Web Scraping Image)
*   **Arsitektur**: Model-View-Controller (MVC) terstruktur (`Frontend/` dan `Admin/`)

---

## 🚀 Cara Instalasi & Menjalankan (Local Development)

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer Anda menggunakan **Laragon**:

### 1. Clone Repository
```bash
git clone https://github.com/username/portal-karanganyar.git
cd portal-karanganyar
```

### 2. Install Dependensi (Composer)
```bash
composer install
```

### 3. Konfigurasi Environment (`.env`)
Copy file konfigurasi `.env.example` menjadi `.env`.
```bash
cp .env.example .env
```
Buka file `.env` dan sesuaikan koneksi database (Pastikan MySQL di Laragon sudah menyala):
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portal_karanganyar
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Jalankan Migrasi & Seeder Database
Perintah ini akan membuat tabel dan mengisi data awal (Termasuk Akun Admin Utama & Link Menu Default).
```bash
php artisan migrate --seed
```

### 6. Jalankan Server Lokal
```bash
php artisan serve
```
Aplikasi sekarang dapat diakses di: **`http://localhost:8000`**

---

## 🔑 Akun Akses Default (Testing)

Saat database selesai di-*seed*, Anda dapat masuk ke Dashboard Admin menggunakan kredensial berikut:

*   **URL Login**: `http://localhost:8000/admin/login`
*   **Username**: `DiskominfoKeren`
*   **Password**: `DiskominfoKaranganyarKeren`

---

## 📂 Struktur Direktori Penting

Sistem telah di-*refactor* agar terstruktur profesional:

```text
app/
├── Http/Controllers/
│   ├── Admin/         <-- Logika Dashboard Admin (News, User, Menu Links)
│   ├── Auth/          <-- Logika Login & Registrasi
│   └── Frontend/      <-- Logika Halaman Publik (Beranda, Profil, Berita)
├── Models/
│   ├── MenuLink.php
│   ├── News.php
│   └── User.php
resources/
├── views/
│   ├── admin/         <-- Tampilan Panel Admin (Blade Templates)
│   └── frontend/      <-- Tampilan Halaman Pengunjung Publik
public/
├── css/app.css        <-- Custom styling CSS
└── images/            <-- Assets gambar statis (Logo Bupati, Header, dll)
docs/
└── screenshots/       <-- Dokumentasi gambar aplikasi
```

---
*Dikembangkan untuk Pemerintah Kabupaten Karanganyar © 2026.*
