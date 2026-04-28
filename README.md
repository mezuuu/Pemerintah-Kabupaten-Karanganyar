<div align="center">

<img src="public/images/logo.png" alt="Logo Kabupaten Karanganyar" width="90"/>

# Portal Resmi Pemerintah Kabupaten Karanganyar

**Platform informasi & layanan publik digital Kabupaten Karanganyar**

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

</div>

---

## 📋 Daftar Isi

- [Tentang Proyek](#-tentang-proyek)
- [Screenshot Tampilan Aplikasi](#-screenshot-tampilan-aplikasi)
- [Fitur Utama](#-fitur-utama)
- [Teknologi yang Digunakan](#️-teknologi-yang-digunakan)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Cara Instalasi & Menjalankan](#-cara-instalasi--menjalankan-local-development)
- [Akun Akses Default](#-akun-akses-default-testing)
- [Struktur Direktori](#-struktur-direktori-penting)
- [Daftar Route Aplikasi](#-daftar-route-aplikasi)
- [Skema Database](#️-skema-database)
- [Arsitektur Keamanan](#-arsitektur-keamanan)

---

## 🏛️ Tentang Proyek

**Portal Resmi Pemerintah Kabupaten Karanganyar** adalah aplikasi web berbasis **Laravel 10** yang dikembangkan sebagai pusat informasi, berita, dan layanan publik digital untuk warga Kabupaten Karanganyar, Jawa Tengah.

Proyek ini dibangun selama program **Magang Kominfo** dan dirancang dengan dua lapisan utama:

| Lapisan | Keterangan |
|---|---|
| 🌐 **Frontend (Publik)** | Halaman yang dapat diakses bebas oleh seluruh masyarakat, menampilkan informasi daerah, berita terkini, dan data pemerintah. |
| 🛡️ **Backend (Admin)** | Panel manajemen khusus untuk operator Diskominfo guna mengelola konten, berita, navigasi, dan akun pengguna. |

---

## 📸 Screenshot Tampilan Aplikasi

### 1. Tampilan Pengunjung — Beranda (Frontend)

Halaman beranda yang dihadapi oleh seluruh masyarakat sebagai pengunjung. Menampilkan hero section dengan foto Bupati & Wakil Bupati, statistik daerah, serta navigasi menu yang dikelola secara dinamis dari database.

![Beranda Portal Karanganyar](docs/screenshots/home-desktop.png)

> **Komponen yang terlihat pada gambar di atas:**
> - **Top Bar**: Tautan cepat ke Satudata, Opendata, PPID, Layanan Publik, SP4N Lapor, dan LaporGub.
> - **Navbar Utama**: Logo Pemkab, menu Beranda, Profil, Perangkat Daerah, Berita, Aduan, Data — semua dengan dukungan dropdown dinamis.
> - **Hero Section**: Slogan *"Selamat Datang di Kabupaten Karanganyar"*, foto Bupati **H. Rober Christanto, S.E., M.M.** dan Wakil Bupati **H. Adhe Eliana, S.E.**, serta tombol CTA "Layanan Publik".
> - **Statistik Daerah**: 900K+ Penduduk, 17 Kecamatan, 177 Desa/Kelurahan, 20+ Layanan Online.

---

### 2. Tampilan Dashboard Admin (Backend)

Panel administrasi khusus operator Diskominfo. Menyediakan statistik ringkas, manajemen berita, manajemen link navigasi, dan persetujuan akun editor.

![Admin Dashboard Portal Karanganyar](docs/screenshots/admin-dashboard.png)

> **Komponen yang terlihat pada gambar di atas:**
> - **Sidebar Navigasi**: Dashboard, Kelola Berita, Kelola Link Menu, Kelola Akun, Lihat Website, Logout.
> - **Kartu Statistik**: Total Berita, Total Pengguna, dan Jumlah Akun Menunggu Persetujuan.
> - **Tabel Berita Terbaru**: Pratinjau thumbnail OG Image, judul headline, kategori (badge), tanggal publikasi, dan nama operator pembuat.
> - **Tombol Tambah Berita**: Akses cepat ke form penambahan berita baru.

---

## ✨ Fitur Utama

### 🌐 Frontend (Halaman Publik)

| Fitur | Deskripsi |
|---|---|
| **Desain Modern & Responsif** | Antarmuka elegan menggunakan Bootstrap 5.3 & Vanilla CSS, dioptimalkan untuk Desktop, Tablet, dan Mobile. |
| **Hero Section Dinamis** | Menampilkan foto kepala daerah, slogan, dan tombol call-to-action yang menarik. |
| **Statistik Daerah** | Kartu statistik animatif: jumlah penduduk, kecamatan, desa/kelurahan, dan layanan online. |
| **Berita Otomatis (OG Image Scraper)** | Saat URL berita ditambahkan, sistem secara otomatis mengambil gambar thumbnail via PHP cURL dengan parsing meta tag `og:image` dan `twitter:image`. |
| **Navigasi Dinamis** | Menu dropdown (Perangkat Daerah, Aduan, Data) diisi dari database—tidak di-hardcode—sehingga dapat diubah admin kapan saja. |
| **GPR Widget Kominfo** | Terintegrasi dengan widget Government Public Relations (GPR) resmi Kominfo Pusat di bagian footer. |
| **Tautan Layanan Publik** | Shortcut top-bar ke Satudata, Opendata, PPID, SP4N Lapor, dan LaporGub. |
| **Auto-Logout Admin** | Jika seorang admin yang sedang login membuka halaman publik, sesi admin akan otomatis dihapus (middleware `LogoutOnPublicPages`). |

### 🛡️ Backend (Dashboard Admin)

| Fitur | Deskripsi |
|---|---|
| **Autentikasi Berlapis** | Sistem login khusus admin dengan proteksi No-Cache Headers untuk mencegah bypass via tombol *Back* browser. |
| **Manajemen Berita (CRUD)** | Tambah, edit, dan hapus berita. Thumbnail diambil otomatis dari URL sumber. Mendukung refresh manual gambar OG. |
| **Manajemen Menu Navbar** | Tambah, edit, dan hapus link pada menu navigasi publik (mendukung tipe Internal dan Eksternal, serta sub-menu). |
| **Manajemen Pengguna** | Registrasi bertahap: akun Editor baru **wajib disetujui** oleh Administrator sebelum dapat login. Admin dapat menyetujui, menolak, atau menghapus akun. |
| **Sistem Role** | Dua level akses: `Administrator` (akses penuh) dan `Editor` (akses terbatas). |
| **Dashboard Ringkasan** | Tampilan statistik total berita, total pengguna, dan daftar akun menunggu persetujuan secara *real-time*. |

---

## 🛠️ Teknologi yang Digunakan

| Kategori | Teknologi | Versi |
|---|---|---|
| **Backend Framework** | Laravel | 10.x |
| **Bahasa Pemrograman** | PHP | ^8.1 |
| **Database** | MySQL | 8.x |
| **Frontend CSS** | Bootstrap | 5.3 |
| **Frontend Styling** | Vanilla CSS | — |
| **HTTP Client** | PHP cURL (built-in) | — |
| **Package Manager** | Composer | 2.x |
| **Build Tool** | Vite | — |
| **Dev Environment** | Laragon | — |
| **Arsitektur** | MVC (Model-View-Controller) | — |

---

## 📦 Persyaratan Sistem

Pastikan sistem Anda memenuhi persyaratan berikut sebelum instalasi:

- **PHP** >= 8.1 (dengan ekstensi: `curl`, `mbstring`, `openssl`, `pdo`, `pdo_mysql`, `tokenizer`, `xml`)
- **Composer** >= 2.x
- **MySQL** >= 5.7 / MariaDB >= 10.3
- **Node.js** >= 18.x & **npm** >= 9.x
- **Web Server**: Laragon (direkomendasikan) / XAMPP / Apache / Nginx

---

## 🚀 Cara Instalasi & Menjalankan (Local Development)

Ikuti langkah-langkah berikut secara berurutan untuk menjalankan project di komputer Anda:

### Langkah 1 — Clone Repository

```bash
git clone https://github.com/mezuuu/Pemerintah-Kabupaten-Karanganyar.git
cd Pemerintah-Kabupaten-Karanganyar
```

### Langkah 2 — Install Dependensi PHP (Composer)

```bash
composer install
```

### Langkah 3 — Install Dependensi Node.js

```bash
npm install
```

### Langkah 4 — Konfigurasi Environment (`.env`)

Duplikat file konfigurasi:

```bash
cp .env.example .env
```

Buka file `.env` dan sesuaikan nilai berikut (pastikan MySQL di Laragon sudah aktif):

```env
APP_NAME="Portal Karanganyar"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portal_karanganyar
DB_USERNAME=root
DB_PASSWORD=
```

### Langkah 5 — Generate Application Key

```bash
php artisan key:generate
```

### Langkah 6 — Buat Database

Buka phpMyAdmin (atau MySQL client lainnya) dan buat database baru:

```sql
CREATE DATABASE portal_karanganyar CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Langkah 7 — Jalankan Migrasi & Seeder Database

Perintah ini akan membuat semua tabel dan mengisi data awal (akun admin utama + link menu navigasi default):

```bash
php artisan migrate --seed
```

### Langkah 8 — Jalankan Server Lokal

```bash
php artisan serve
```

Aplikasi dapat diakses di: **`http://localhost:8000`**

Untuk akses jaringan lokal (LAN):

```bash
php artisan serve --host 0.0.0.0 --port 8000
```

---

## 🔑 Akun Akses Default (Testing)

Setelah database selesai di-*seed*, gunakan kredensial berikut untuk masuk ke Dashboard Admin:

| Field | Nilai |
|---|---|
| **URL Login** | `http://localhost:8000/admin/login` |
| **Username** | `DiskominfoKeren` |
| **Password** | `DiskominfoKaranganyarKeren` |
| **Role** | Administrator |

> ⚠️ **Penting:** Segera ganti password default ini pada lingkungan produksi melalui menu **Kelola Akun** di Dashboard Admin.

---

## 📂 Struktur Direktori Penting

```text
Pemerintah-Kabupaten-Karanganyar/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/                  ← Logika Panel Admin
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── NewsController.php      (CRUD Berita + OG Image Scraper)
│   │   │   │   ├── UserController.php      (Kelola & Approve Akun)
│   │   │   │   └── MenuLinkController.php  (Kelola Link Navbar)
│   │   │   ├── Auth/
│   │   │   │   └── LoginController.php     (Login, Logout, Registrasi)
│   │   │   └── Frontend/
│   │   │       └── HomeController.php      (Beranda, Berita, Layanan Publik)
│   │   └── Middleware/
│   │       ├── AdminApproved.php           (Cek status approval akun)
│   │       ├── NoCacheHeaders.php          (Prevent browser back bypass)
│   │       └── LogoutOnPublicPages.php     (Auto-logout admin di halaman publik)
│   └── Models/
│       ├── MenuLink.php
│       ├── News.php
│       └── User.php
│
├── database/
│   ├── migrations/                     ← Definisi skema tabel
│   ├── seeders/
│   │   ├── AdminSeeder.php             (Seed akun admin default)
│   │   ├── MenuLinkSeeder.php          (Seed link navigasi default)
│   │   └── DatabaseSeeder.php
│   └── portal_karanganyar.sql          ← Dump SQL cadangan database
│
├── resources/
│   └── views/
│       ├── admin/                      ← Template Blade panel admin
│       └── frontend/                   ← Template Blade halaman publik
│
├── routes/
│   └── web.php                         ← Definisi semua route aplikasi
│
├── public/
│   ├── css/app.css                     ← Custom styling CSS utama
│   └── images/                         ← Aset gambar statis (logo, header, dll.)
│
└── docs/
    └── screenshots/                    ← Dokumentasi screenshot aplikasi
        ├── home-desktop.png
        └── admin-dashboard.png
```

---

## 🗺️ Daftar Route Aplikasi

### Route Publik (Frontend)

| Method | URL | Nama Route | Keterangan |
|---|---|---|---|
| `GET` | `/` | `home` | Halaman Beranda Utama |
| `GET` | `/profil` | `profil` | Profil Kabupaten Karanganyar |
| `GET` | `/legislatif` | `legislatif` | Informasi Legislatif |
| `GET` | `/pejabat` | `pejabat` | Daftar Pejabat Daerah |
| `GET` | `/rlppd` | `rlppd` | Ringkasan Laporan Penyelenggaraan Pemda |
| `GET` | `/organisasi/{slug}` | `organisasi` | Halaman Perangkat Daerah |
| `GET` | `/berita` | `berita` | Daftar Berita Daerah |
| `GET` | `/layanan-publik` | `layanan-publik` | Direktori Layanan Publik |
| `GET` | `/wbs` | `wbs` | Whistleblowing System |
| `GET` | `/suara-masyarakat` | `suara-masyarakat` | Form Aduan Masyarakat |
| `GET` | `/transparansi-anggaran` | `transparansi-anggaran` | Data Transparansi Anggaran |
| `GET` | `/hibah-dan-bansos` | `hibah-bansos` | Data Hibah & Bantuan Sosial |
| `GET` | `/statistik` | `statistik` | Statistik Daerah |

### Route Admin (Dilindungi Autentikasi)

| Method | URL | Nama Route | Keterangan |
|---|---|---|---|
| `GET` | `/admin/login` | `admin.login` | Form Login Admin |
| `POST` | `/admin/login` | `admin.login.submit` | Proses Login |
| `POST` | `/admin/logout` | `admin.logout` | Proses Logout |
| `POST` | `/admin/register` | `admin.register` | Registrasi Akun Editor |
| `GET` | `/admin` | `admin.dashboard` | Dashboard Utama |
| `GET/POST` | `/admin/news` | `admin.news.*` | Manajemen Berita (CRUD) |
| `GET/PUT/DELETE` | `/admin/users` | `admin.users.*` | Manajemen Pengguna |
| `GET/POST/PUT/DELETE` | `/admin/menu-links` | `admin.menu-links.*` | Manajemen Link Navbar |

---

## 🗃️ Skema Database

### Tabel `users`

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | BIGINT (PK) | Primary key |
| `name` | VARCHAR(255) | Nama lengkap pengguna |
| `username` | VARCHAR(255) | Username unik untuk login |
| `password` | VARCHAR(255) | Password terenkripsi (bcrypt) |
| `role` | ENUM | `administrator` / `editor` |
| `is_approved` | BOOLEAN | Status persetujuan akun (default: `false`) |
| `created_at` | TIMESTAMP | Waktu pendaftaran |

### Tabel `news`

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | BIGINT (PK) | Primary key |
| `headline` | VARCHAR(255) | Judul berita |
| `description` | TEXT | Ringkasan isi berita |
| `link` | TEXT | URL sumber berita asli |
| `og_image` | TEXT | URL gambar thumbnail (hasil scraping OG) |
| `category` | VARCHAR(50) | Kategori berita |
| `created_by` | BIGINT (FK) | ID pengguna pembuat |
| `created_at` | TIMESTAMP | Waktu publikasi |

### Tabel `menu_links`

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | BIGINT (PK) | Primary key |
| `label` | VARCHAR(255) | Teks yang tampil di menu |
| `url` | TEXT | URL tujuan link |
| `type` | ENUM | `internal` / `external` |
| `parent_menu` | VARCHAR(100) | Nama dropdown induk (misal: `perangkat-daerah`) |
| `order` | INTEGER | Urutan tampil di navbar |
| `created_at` | TIMESTAMP | Waktu dibuat |

---

## 🔒 Arsitektur Keamanan

Sistem ini menerapkan beberapa lapisan keamanan khusus:

### 1. `NoCacheHeaders` Middleware
Menambahkan HTTP header `Cache-Control: no-cache, no-store, must-revalidate` pada seluruh route admin. Mencegah browser menyimpan halaman admin dalam cache, sehingga pengguna tidak dapat mengakses halaman admin yang sudah di-logout menggunakan tombol *Back* browser.

### 2. `LogoutOnPublicPages` Middleware
Setiap kali seorang admin yang sedang login mengakses halaman publik (`/`, `/berita`, dll.), middleware ini secara otomatis menghapus sesi login admin tersebut. Ini memastikan tidak ada sesi admin yang "bocor" ke halaman publik.

### 3. `AdminApproved` Middleware
Memverifikasi bahwa akun yang sedang login memiliki status `is_approved = true`. Jika akun baru terdaftar (Editor belum disetujui), middleware ini memblokir akses ke dashboard dan menampilkan pesan informasi.

### 4. CSRF Protection
Semua form yang melakukan operasi `POST`, `PUT`, dan `DELETE` dilindungi dengan token CSRF bawaan Laravel (`@csrf`), mencegah serangan Cross-Site Request Forgery.

---

## 👥 Kontributor

Proyek ini dikembangkan sebagai bagian dari program **Magang MSIB di Dinas Komunikasi dan Informatika (Diskominfo) Kabupaten Karanganyar**.

---

<div align="center">

*Dikembangkan untuk Pemerintah Kabupaten Karanganyar © 2026.*

**🌐 [Kunjungi Website](http://localhost:8000) · 🛡️ [Login Admin](http://localhost:8000/admin/login)**

</div>
