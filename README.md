# 🚀 Anang Muhamad Lutfi — Personal Developer Portfolio & Admin CMS

![Laravel](https://img.shields.io/badge/Laravel-12.x%20%7C%2013.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-14%2B-4169E1?style=for-the-badge&logo=postgresql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-v4-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-v3-8BC0D0?style=for-the-badge&logo=alpinedotjs&logoColor=white)
![Tests](https://img.shields.io/badge/Tests-59%20Passed%20(100%25)-10B981?style=for-the-badge&logo=phpunit&logoColor=white)
![Code Style](https://img.shields.io/badge/Code_Style-PSR--12%20(Pint)-blue?style=for-the-badge&logo=php&logoColor=white)

Portofolio web profesional modern dan mesin CMS kustom berkecepatan tinggi yang dirancang untuk **Anang Muhamad Lutfi** (Backend & Full-Stack Web Developer). Dibangun dengan arsitektur tangguh berbasis **Laravel**, **PostgreSQL**, **Tailwind CSS v4**, dan **Alpine.js**.

---

## 📖 Ringkasan Proyek

Platform ini dirancang khusus untuk mempublikasikan proyek rekayasa perangkat lunak berskala produksi, studi kasus arsitektur backend transaksi tinggi, matriks keahlian teknis (*Technical Matrix*), riwayat pengalaman karier, sertifikasi kompetensi resmi BNSP, serta keikutsertaan seminar/pelatihan IT terverifikasi.

Dilengkapi dengan **Custom Admin CMS** independen yang elegan, cepat, dan aman, memungkinkan pemilik portofolio mengelola seluruh data secara mandiri tanpa perlu mengubah baris kode apa pun.

### 🎨 Karakteristik & Filosofi Desain
- **Tech Minimalist & Editorial Aesthetic**: Kanvas bersih murni (*pure white* `#FFFFFF` pada Light Mode dan deep navy `#0A0F1D` pada Dark Mode).
- **Vibrant Royal Blue Accent**: Aksen biru teknologi `#2563EB` yang tajam dan presisi.
- **Tipografi Editorial**: Kombinasi sans-serif geometris modern (*Plus Jakarta Sans*), font monospace (*JetBrains Mono*), dan sentuhan kursif berkelas (*Instrument Serif*).
- **Floating Pill Navigation**: Navbar kapsul mengambang dengan fitur *active scrollspy* responsif dan transisi halus.
- **Top Reading Scroll Progress Bar**: Garis gradasi neon tipis di puncak browser yang melacak progres membaca secara *real-time* (60–120 FPS).
- **Staggered Wave Card Animations**: Efek kemunculan kartu-kartu karya, bento skills, dan kredensial secara bergelombang halus (*smooth cubic-bezier*).
- **Fullscreen Image Lightbox**: Peninjau gambar antarmuka layar penuh (*modal zoom-in*) pada halaman detail studi kasus.

---

## 💼 Karya & Proyek Nyata yang Terpasang (Production-Ready Projects)

Portofolio ini menampilkan 4 proyek nyata berbobot arsitektur tinggi lintas domain:

1. **RaiLoka — Sistem Pemesanan Tiket Kereta Api Modern & Concurrency-Safe**
   - **Arsitektur:** Monorepo (Next.js 15 App Router + Laravel 13 REST API) & PostgreSQL.
   - **Keunggulan:** Pencegahan *double-booking* tiket dengan transaksi ACID PostgreSQL & row-level locking (`SELECT ... FOR UPDATE`), integrasi payment gateway Midtrans Snap (QRIS, VA Bank, E-Wallet) dengan verifikasi signature SHA-512, Customer Service live chat ditenagai Laravel Reverb (WebSocket), dan validasi boarding pass digital QR Code.
   - **Repository:** [github.com/AnangML/Railoka](https://github.com/AnangML/Railoka)
2. **NgemilKukis — Platform E-Commerce Kukis Artisanal & Manajemen Operasional Terpadu**
   - **Arsitektur:** Laravel Monolith + Blade + Alpine.js + Tailwind CSS v4 (Palet 60-30-10).
   - **Keunggulan:** Flyout cart drawer tanpa reload, integrasi Xendit Payment Gateway dengan proteksi *Idempotency Key*, sistem loyalitas *Kukis VIP Club* & *Cookie Crumbs* (cashback belanja & point ledger), kontrol akses multi-role (RBAC 4 level), dan Audit Trail (Log Aktivitas) menyeluruh dengan modal diff JSON.
   - **Repository:** [github.com/AnangML/NgemilKukis](https://github.com/AnangML/NgemilKukis)
3. **Sistem Manajemen Sertifikasi (Certificate List Management / LSP CELIA)**
   - **Arsitektur:** Laravel, PostgreSQL, Tailwind CSS.
   - **Keunggulan:** Platform repositori sertifikat terpusat untuk Lembaga Sertifikasi Profesi (LSP) Universitas Pamulang guna memangkas waktu validasi berkas dan percetakan sertifikat kompetensi mahasiswa.
4. **Sistem Informasi Posyandu Soka**
   - **Arsitektur:** Node.js, Express, Web Architecture.
   - **Keunggulan:** Digitalisasi layanan kesehatan masyarakat Posyandu Soka untuk pendaftaran pasien, pencatatan rekam medis pemeriksaan berkala anak & lansia, serta transparansi laporan kader.

---

## 🏆 Kredensial, Sertifikasi & Pelatihan Terverifikasi

- **3 Sertifikasi Resmi Kompetensi:**
  1. *Badan Nasional Sertifikasi Profesi (BNSP)* — Pemrogram (Software Developer)
  2. *Badan Nasional Sertifikasi Profesi (BNSP)* — Network Engineering (Teknik Jaringan Komputer)
  3. *TOEFL Prediction* — English Language Proficiency
- **8 Seminar IT Universitas Pamulang:**
  - AI & Machine Learning, System Analyst, Public Relations for Tech, Pemrograman Terstruktur, dll.
- **Pendidikan Terverifikasi:**
  - *Universitas Pamulang* — S1 Teknik Informatika (2022 – Sekarang)
  - *SMK Negeri 43 Jakarta* — Teknik Komputer dan Jaringan / TKJ (2024 Lulus)

---

## ✨ Fitur Unggulan Sistem

### 🌐 1. Tampilan Publik (Frontend)
- **Top Reading Scroll Progress Bar**: Garis gradasi neon setinggi 2.5px di posisi `fixed top-0 left-0` yang diperbarui via `requestAnimationFrame` dan *passive listener* tanpa lag.
- **Staggered "Wave" Reveal**: Seluruh grid kartu (Proyek, Bento Skills, Kredensial, Artikel) muncul bertahap secara berurutan (*stagger delay 50ms – 600ms*) saat pengguna melakukan scroll.
- **Hero Section Dinamis**: Headline dan bio interaktif dari database, status ketersediaan (*Available for new projects*), tombol CTA langsung, dan unduh CV PDF.
- **Dukungan Dwibahasa (Bilingual i18n)**: Pengalihan bahasa instan antara **Bahasa Indonesia (`id`)** dan **English (`en`)** dengan fallback aman.
- **Dark & Light Mode Switcher**: Toggle tema elegan dengan sinkronisasi ke `localStorage`.
- **Showcase Proyek & Filter Interaktif**: Filter kategori proyek (*Aplikasi Web*, *Full-Stack*, *E-Commerce*) tanpa reload halaman (*zero page reload*) via Alpine.js.
- **Studi Kasus Proyek (`/projects/{slug}`)**: Membedah latar belakang masalah, arsitektur solusi sistem, stack teknologi yang digunakan, serta tombol peninjau gambar (*Image Lightbox Review Modal*).
- **Navbar Cerdas**: Otomatis mendeteksi rute aktif dan menyorot menu `Karya` saat pengguna berada di halaman detail proyek.
- **Form Kontak Simetris & Terproteksi**: Layout form kontak presisi sejajar bawah (`lg:items-end`) dengan kartu kontak langsung, dilengkapi perlindungan anti-bot (*honeypot*) dan pembatas frekuensi (*rate limiter throttle:5,1*).
- **Optimasi SEO & Aksesibilitas**: XML Sitemap dinamis (`/sitemap.xml`), `robots.txt`, dan metadata terstruktur Schema.org `Person` JSON-LD serta dukungan `prefers-reduced-motion`.

### 🛡️ 2. Pusat Kendali Admin (Custom CMS `/admin`)
- **Autentikasi Aman & Brute-Force Protection**: Rute login `/admin/login` dilindungi pembatasan percobaan gagal (*throttle 5 requests per minute*).
- **Dashboard Overview**: Metrik ringkasan jumlah proyek terbit, keterampilan teknis, pengalaman, seminar/pelatihan, dan notifikasi pesan masuk baru.
- **Pengaturan Profil & CV**: Edit display name, headline, bio dwibahasa, link media sosial, serta upload dan pergantian berkas CV PDF resmi.
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
| **Backend Framework** | Laravel 12 / 13 | PHP 8.3 modern framework dengan RESTful controller & Eloquent ORM |
| **Database** | PostgreSQL 14+ | Relational database performa tinggi dengan indeks komposit teroptimasi |
| **Frontend Styling** | Tailwind CSS v4 | Engine CSS generasi terbaru berbasis `@tailwindcss/vite` |
| **Frontend Reactivity** | Alpine.js v3 | State management ringan untuk filter kategori, modal lightbox, dan interaktivitas |
| **Asset Bundler** | Vite 8 | Kompilasi aset ultra-cepat dengan Hot Module Replacement (HMR) |
| **Tipografi** | Plus Jakarta Sans & Instrument Serif | Google Web Fonts untuk estetika minimalis modern |
| **Testing** | PHPUnit 12 | **59 Feature & Unit tests dengan 280 assertions (100% passing)** |
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
Perintah ini akan membuat skema tabel dan mengisinya dengan data portofolio nyata Anang Muhamad Lutfi beserta akun Administrator:
```bash
php artisan migrate --seed
```

### 6. Pasang Dependensi Frontend & Compile Aset
```bash
npm install
npm run build
```
*(Catatan untuk lingkungan pengembangan lokal: jalankan `npm run dev` atau `npm.cmd run dev` untuk mengaktifkan Hot Module Replacement).*

### 7. Jalankan Server Pengembangan
```bash
php artisan serve
```
Aplikasi kini dapat diakses melalui peramban web di: **`http://localhost:8000`** (atau via Laragon/Nginx di **`http://myporto.test`**).

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

Proyek ini dilengkapi pengujian otomatis menyeluruh (*automated testing*) dengan tingkat kelulusan 100%:

### Menjalankan Seluruh Automated Test
```bash
php artisan test
```

### Menjalankan Test Spesifik
```bash
# Uji Fitur Publik (Hero, Portfolio, Detail, Contact, CV, Navbar)
php artisan test tests/Feature/PublicPortfolioTest.php

# Uji Panel CMS Admin (Login, Projects, Skills, Experiences, Messages)
php artisan test tests/Feature/AdminPanelTest.php

# Uji Modul Seminar & Pelatihan IT (Cascading Wilayah & Sub Kejuruan)
php artisan test tests/Feature/TrainingManagementTest.php

# Uji Kualitas Sistem (Sitemap, Robots.txt, Error Pages 404/403/500, JSON-LD, Security)
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
│   │   └── Requests/                   # Dedicated Form Requests (StoreContactRequest)
│   ├── Models/                         # Eloquent Models (Project, Skill, Experience, Training, ProfileSetting, dll.)
│   └── Services/
│       └── IndonesiaRegionService.php  # Dataset resmi 38 Provinsi & 514 Kota/Kabupaten Kemendagri
├── database/
│   ├── migrations/                     # Skema tabel PostgreSQL terindeks
│   └── seeders/                        # PortfolioSeeder & TrainingSeeder (Idempotent)
├── public/
│   ├── data/
│   │   └── indonesia-regions.json      # Dataset wilayah Indonesia untuk dropdown instan
│   └── storage/projects/               # Cover & tangkapan layar proyek nyata
├── resources/
│   ├── css/app.css                     # Tailwind CSS v4 source
│   ├── js/app.js                       # Alpine.js & client scripts
│   └── views/
│       ├── admin/                      # Template Blade panel CMS
│       ├── components/                 # Blade components (layouts, navbar, footer, hero, cards)
│       ├── projects/                   # Halaman detail studi kasus & modal lightbox
│       └── errors/                     # Halaman kustom 404, 403, 500
├── routes/
│   └── web.php                         # Rute publik & rute admin terproteksi
└── tests/
    └── Feature/                        # Test suite pengujian otomatis (59 Tests, 280 Assertions)
```

---

## 📄 Lisensi

Proyek ini bersifat terbuka di bawah lisensi [MIT License](LICENSE).
Dikembangkan dengan bangga oleh **Anang Muhamad Lutfi**.
