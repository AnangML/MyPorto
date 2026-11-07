# 04 — System Architecture

## Architectural style

Laravel monolith dengan server-rendered Blade. PostgreSQL sebagai primary database. Admin CMS berada dalam aplikasi yang sama dan diproteksi middleware/authentication.

## Stack

| Layer | Pilihan |
|---|---|
| Runtime | PHP 8.2+ |
| Framework | Laravel 12 |
| Database | PostgreSQL |
| Public UI | Blade |
| CSS | Tailwind CSS |
| Lightweight JS | Alpine.js |
| Admin CMS | Filament (cek kompatibilitas versi) |
| Icons | Lucide |
| Tests | Pest atau PHPUnit |
| Cache/queue | Database untuk awal; Redis opsional |
| File storage | Laravel Storage |
| PDF | Package PDF yang kompatibel atau file CV yang diunggah |

## High-level architecture

```text
Visitor Browser
   |
   | HTTPS
   v
Laravel Routes
   |
   +--> Public Controllers --> Services/Queries --> PostgreSQL
   |                         |
   |                         +--> Blade Views
   |
   +--> Contact Controller --> Validation/Rate Limit --> PostgreSQL
   |
   +--> CV Download Controller --> Private/Public Storage
   |
Admin Browser
   |
   v
Authentication + Authorization
   |
   v
Filament Admin / Admin Resources
   |
   v
Models / Actions / PostgreSQL

Scheduled Tasks
   +--> Aggregate/cleanup analytics
   +--> Optional maintenance tasks
```

## Application layers

- Routes: deklarasi endpoint dan middleware.
- Controllers: orchestration request-response, bukan tempat business logic besar.
- Form Requests: validasi input.
- Models: relasi dan casts.
- Actions/Services: operasi bisnis yang dapat digunakan ulang.
- Queries: query kompleks dan filter publik.
- Policies: authorization.
- Blade Components: UI reusable.
- Jobs: pekerjaan asynchronous jika benar-benar diperlukan.

## Suggested directory additions

```text
app/
  Actions/
  Enums/
  Http/
    Controllers/
    Requests/
  Models/
  Policies/
  Services/
  Support/
resources/
  views/
    components/
    layouts/
    pages/
    projects/
    blog/
  lang/
  css/
  js/
```

Struktur aktual mengikuti Laravel dan Filament; jangan membuat folder kosong hanya demi mengikuti diagram.

## Localization

Gunakan locale `id` dan `en`. Simpan konten bilingual menggunakan kolom terpisah atau struktur translation yang diputuskan sebelum migration. Untuk MVP, kolom `title_id`, `title_en`, `content_id`, `content_en` mudah dipahami dan tidak membutuhkan package tambahan. UI labels menggunakan Laravel lang files.

## GitHub integration

MVP: simpan username, profile URL, repository URL, dan metadata proyek secara manual. Tahap lanjutan: GitHub API publik opsional dengan cache, timeout, dan fallback. Website tetap harus berfungsi ketika API gagal atau rate limit tercapai.

## Analytics

First-party event aggregation. Hindari fingerprinting. Simpan path, tanggal, referrer domain (opsional), user-agent category (opsional), dan hashed/truncated IP hanya jika ada dasar privasi yang jelas. Prefer agregasi harian dan retensi terbatas.

## Deployment topology

Nginx/Apache → PHP-FPM → Laravel → PostgreSQL. HTTPS wajib. Scheduler dan queue worker dijalankan sesuai kebutuhan. Backup database dan file harus diuji pemulihannya.
