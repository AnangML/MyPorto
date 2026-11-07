# 🚀 Anang Muhamad Lutfi — Personal Developer Portfolio & Admin CMS

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-14%2B-4169E1?style=for-the-badge&logo=postgresql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-v4-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-v3-8BC0D0?style=for-the-badge&logo=alpinedotjs&logoColor=white)
![Tests](https://img.shields.io/badge/Tests-40%20Passed%20(100%25)-10B981?style=for-the-badge&logo=checkmarx&logoColor=white)

Portofolio web profesional modern dan mesin CMS kustom berkecepatan tinggi yang dirancang untuk **Anang Muhamad Lutfi** (Backend & Web Developer). Dibangun dengan arsitektur tangguh berbasis **Laravel 12**, **PostgreSQL**, **Tailwind CSS v4**, dan **Alpine.js**.

---

## 📖 Ringkasan Proyek

Platform ini dirancang khusus untuk mempublikasikan proyek rekayasa perangkat lunak, studi kasus arsitektur backend, matriks keahlian teknis, riwayat pengalaman karier, sertifikasi kompetensi, serta keikutsertaan seminar/pelatihan IT. 

Dilengkapi dengan **Custom Admin CMS** independen yang elegan, cepat, dan aman, memungkinkan pemilik portofolio mengelola seluruh data secara mandiri tanpa perlu mengubah baris kode apa pun.

### 🎨 Karakteristik & Filosofi Desain
- **Tech Minimalist & Editorial Aesthetic**: Kanvas bersih murni (*pure white* `#FFFFFF` pada Light Mode dan deep navy `#0A0F1D` pada Dark Mode).
- **Vibrant Royal Blue Accent**: Aksen biru teknologi `#2563EB` yang tajam dan presisi.
- **Tipografi Editorial**: Kombinasi sans-serif geometris modern (*Plus Jakarta Sans*), font monospace (*JetBrains Mono*), dan sentuhan kursif berkelas (*Instrument Serif*).
- **Floating Pill Navigation**: Navbar kapsul mengambang dengan fitur *active scrollspy* responsif dan transisi halus.
- **Radiant Ambient Glow**: Efek pendaran cahaya biru lembut pada foto portrait monokrom.

---

## ✨ Fitur Unggulan

### 🌐 1. Tampilan Publik (Frontend)
- **Hero Editorial Section**: Headline dinamis, bio interaktif, status ketersediaan (*Available for new projects*), tag tech stack, dan tombol aksi langsung.
- **Dukungan Dwibahasa (Bilingual)**: Pengalihan bahasa instan antara **Bahasa Indonesia (`id`)** dan **English (`en`)** dengan fallback aman.
- **Dark & Light Mode Switcher**: Toggle tema elegan dengan persistensi otomatis di `localStorage`.
- **Showcase Proyek & Filter Interaktif**: Filter kategori proyek (*Full-Stack*, *Backend API*, *Enterprise App*, dll.) tanpa memuat ulang halaman (*zero page reload*) menggunakan Alpine.js.
- **Studi Kasus Proyek (`/projects/{slug}`)**: Halaman mendalam membedah latar belakang masalah, arsitektur solusi sistem, stack teknologi yang digunakan, serta tautan ke repositori GitHub dan demo live.
- **Timeline Riwayat Pengalaman**: Garis waktu profesional menyajikan pengalaman kerja, magang industri, dan pendidikan.
- **Form Kontak Terproteksi**: Dilengkapi perlindungan anti-bot (*honeypot field*) dan pembatas frekuensi pengiriman pesan (*rate limiter throttle:5,1*).
- **Akses & Unduh CV Langsung (`/cv`)**: Pengunjung dapat mengunduh berkas Resume/CV PDF resmi terbaru dalam satu klik.
- **Optimasi SEO & Aksesibilitas**: XML Sitemap dinamis (`/sitemap.xml`), `robots.txt`, dan metadata terstruktur Schema.org `Person` JSON-LD.

### 🛡️ 2. Pusat Kendali Admin (Custom CMS `/admin`)
- **Autentikasi Aman & Brute-Force Protection**: Rute login `/admin/login` dilindungi pembatasan percobaan gagal (*throttle 5 requests per minute*).
- **Dashboard Overview**: Metrik ringkasan jumlah proyek terbit, keterampilan teknis, pengalaman, seminar/pelatihan, dan notifikasi pesan masuk baru.
- **Pengaturan Profil & CV**: Edit display name, headline, bio dwibahasa, link media sosial, serta upload dan pergantian berkas CV PDF.
- **Manajemen Proyek (Projects CRUD)**: Tambah, edit, dan arsipkan proyek, upload gambar tangkapan layar, multi-kategori, dan multi-teknologi.
- **Matriks Keahlian (Skills Matrix CRUD)**: Kelola daftar teknologi berdasarkan rumpun (Backend, Frontend, Database, DevOps, Tools) beserta level kemahiran dan status *featured*.
- **Pengalaman Karier (Experiences CRUD)**: Kelola riwayat karier, peran, deskripsi tugas, dan periode kerja aktif.
- **Modul Seminar & Pelatihan IT (Trainings CRUD)**:
  - Form input lengkap: Judul, penyelenggara, kejuruan, dan **11 Sub Kejuruan IT** dwibahasa (*Networking, Technical Support, Computer Engineering, Pemrograman, Multimedia, Database, System Analyst, AI, Public Relations, Graphic Design, IT Governance*).
  - **Cascading Data Wilayah Indonesia**: Pemilihan wilayah administratif resmi BPS/Kemendagri (38 Provinsi & 514 Kota/Kabupaten) secara instan (0ms) tanpa dependensi eksternal, ditambah opsi format Daring (Webinar) dan Luar Negeri.
  - Upload berkas sertifikat (PDF/Gambar hingga 5MB) dan/atau tautan verifikasi online (*Credential URL*).
- **Kotak Masuk Pesan (Inbox Messages)**: Kelola pesan dari formulir kontak dengan alur status (`Baru` $\rightarrow$ `Dibaca` $\rightarrow$ `Dibalas` $\rightarrow$ `Diarsipkan`) dan fitur balas langsung via email klien (*mailto*).

---

## 🛠️ Tech Stack & Dependensi

| Layer | Teknologi | Keterangan |
|---|---|---|
| **Backend Framework** | Laravel 12 (v13.x skeleton) | PHP 8.3+ modern framework dengan RESTful controller & Eloquent ORM |
| **Database** | PostgreSQL 14+ | Relational database performa tinggi dengan indeks komposit teroptimasi |
| **Frontend Styling** | Tailwind CSS v4 | Engine CSS generasi terbaru berbasis `@tailwindcss/vite` |
| **Frontend Reactivity** | Alpine.js v3 | State management ringan untuk filter kategori, modal, dan cascading dropdown |
| **Asset Bundler** | Vite 8 | Kompilasi aset ultra-cepat dengan Hot Module Replacement (HMR) |
| **Tipografi** | Plus Jakarta Sans & Instrument Serif | Google Web Fonts untuk estetika minimalis modern |
| **Testing** | PHPUnit 12 | 40 Feature & Unit tests dengan 173 assertions (100% passing) |
| **Code Formatter** | Laravel Pint | Standardisasi kode PHP PSR-12 |

---

## 💻 Persyaratan Sistem

Pastikan lingkungan lokal Anda memenuhi spesifikasi berikut:
- **PHP** >= 8.3 dengan ekstensi aktif:
  - `pdo_pgsql`
  - `pgsql`
  - `mbstring`
  - `openssl`
  - `fileinfo`
  - `curl`
- **Composer** >= 2.6
- **PostgreSQL** >= 14
- **Node.js** >= 20.x & **npm**

---

## 🚀 Panduan Instalasi Lokal (Setup)

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek di komputer lokal:

### 1. Clone Repositori
```bash
git clone https://github.com/AnangML/MyPorto.git
cd MyPorto
```

### 2. Pasang Dependensi Backend (PHP)
```bash
composer install
```

### 3. Konfigurasi Lingkungan (`.env`)
Salin file konfigurasi contoh:
```bash
cp .env.example .env
```
Buka file `.env` dan sesuaikan koneksi database PostgreSQL Anda:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=myporto
DB_USERNAME=postgres
DB_PASSWORD=rahasia_anda
```

### 4. Generate Application Key & Storage Link
```bash
php artisan key:generate
php artisan storage:link
```

### 5. Jalankan Database Migration & Seeder
Perintah ini akan membuat 13 tabel dan mengisinya dengan data portofolio awal Anang Muhamad Lutfi beserta akun Administrator:
```bash
php artisan migrate --seed
```

### 6. Pasang Dependensi Frontend & Compile Aset
```bash
npm install
npm run build
```
*(Catatan untuk pengguna Windows PowerShell: jika terdapat kebijakan eksekusi skrip, jalankan `npm.cmd run build` atau `npm.cmd run dev`).*

### 7. Jalankan Server Pengembangan
```bash
php artisan serve
```
Aplikasi kini dapat diakses melalui peramban web di: **`http://localhost:8000`** (atau via Laragon/Valet di **`http://myporto.test`**).

---

## 🔑 Kredensial Administrator Default

Setelah menjalankan migrasi dan seeder, Anda dapat masuk ke panel Admin CMS:

- **URL Login Admin**: `http://localhost:8000/admin/login` (atau `http://myporto.test/admin/login`)
- **Email**: `anang@example.com`
- **Kata Sandi**: `password`

> [!IMPORTANT]
> Segera ganti kata sandi default dan data profil Anda di menu **Profile & Settings** setelah berhasil masuk ke panel admin produksi.

---

## 🧪 Pengujian & Kualitas Kode

Proyek ini dilengkapi pengujian otomatis (*automated feature testing*) yang mencakup alur publik, pengunduhan CV, pengiriman formulir kontak, rate-limiting, autentikasi admin, dan modul CRUD:

### Menjalankan Seluruh Automated Test
```bash
php artisan test
```

### Menjalankan Test Spesifik
```bash
# Uji Fitur Publik (Hero, Portfolio, Detail, Contact, CV)
php artisan test tests/Feature/PublicPortfolioTest.php

# Uji Panel CMS Admin (Login, Projects, Skills, Experiences, Messages)
php artisan test tests/Feature/AdminPanelTest.php

# Uji Modul Seminar & Pelatihan IT (Cascading Wilayah & Sub Kejuruan)
php artisan test tests/Feature/TrainingManagementTest.php

# Uji Kualitas Sistem (Sitemap, Robots.txt, Error Pages 404/403/500, JSON-LD)
php artisan test tests/Feature/QualityAssuranceTest.php
```

### Memeriksa & Memformat Standar Kode (Laravel Pint)
```bash
vendor/bin/pint --dirty
```

---

## 📁 Struktur Direktori Penting

```text
MyPorto/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/                  # Controller CMS (Dashboard, Project, Skill, Experience, Training, Profile, Auth)
│   │   │   ├── ContactController.php   # Form kontak publik dengan proteksi Honeypot & Throttle
│   │   │   ├── HomeController.php      # Landing page publik & showcase
│   │   │   └── ProjectController.php   # Detail studi kasus proyek
│   ├── Models/                         # Eloquent Models (Project, Skill, Experience, Training, dll.)
│   └── Services/
│       └── IndonesiaRegionService.php  # Dataset resmi 38 Provinsi & 514 Kota/Kabupaten Kemendagri
├── database/
│   ├── migrations/                     # 13 Skema tabel PostgreSQL
│   └── seeders/                        # PortfolioSeeder & TrainingSeeder
├── public/
│   ├── data/
│   │   └── indonesia-regions.json      # Dataset wilayah Indonesia untuk dropdown instan
│   └── images/                         # Aset gambar portrait & thumbnail
├── resources/
│   ├── css/app.css                     # Tailwind CSS v4 source
│   ├── js/app.js                       # Alpine.js & client scripts
│   └── views/
│       ├── admin/                      # Template Blade panel CMS
│       ├── components/                 # Blade components (layouts, navbar, footer, hero, cards)
│       └── errors/                     # Halaman kustom 404, 403, 500
├── routes/
│   └── web.php                         # Rute publik & rute admin terproteksi
└── tests/
    └── Feature/                        # Test suite pengujian otomatis
```

---

## 📚 Dokumentasi Rujukan

Dokumentasi spesifikasi teknis lengkap tersedia di direktori [`docs/`](file:///d:/laragon/www/MyPorto/docs):
- [`01_PROJECT_OVERVIEW.md`](file:///d:/laragon/www/MyPorto/docs/01_PROJECT_OVERVIEW.md) — Visi produk & ruang lingkup.
- [`04_SYSTEM_ARCHITECTURE.md`](file:///d:/laragon/www/MyPorto/docs/04_SYSTEM_ARCHITECTURE.md) — Arsitektur sistem backend & basis data.
- [`05_DATABASE_SCHEMA.md`](file:///d:/laragon/www/MyPorto/docs/05_DATABASE_SCHEMA.md) — Rancangan skema database PostgreSQL.
- [`06_DESIGN_SYSTEM.md`](file:///d:/laragon/www/MyPorto/docs/06_DESIGN_SYSTEM.md) — Token desain, warna `#2563EB`, dan tipografi.
- [`10_TASK_BREAKDOWN.md`](file:///d:/laragon/www/MyPorto/docs/10_TASK_BREAKDOWN.md) — Rencana tahapan pengerjaan (Phase 0–6).
- [`14_SECURITY_PRIVACY.md`](file:///d:/laragon/www/MyPorto/docs/14_SECURITY_PRIVACY.md) — Kebijakan keamanan, honeypot, dan proteksi privasi.

---

## 📄 Lisensi

Proyek ini bersifat terbuka di bawah lisensi [MIT License](LICENSE).
Dikembangkan dengan bangga oleh **Anang Muhamad Lutfi**.
