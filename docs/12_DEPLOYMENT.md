# 12 — Deployment Guide

## Environment

Contoh konfigurasi (nilai rahasia jangan dimasukkan ke Git):

```dotenv
APP_NAME="Personal Portfolio"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.example
APP_LOCALE=id
APP_FALLBACK_LOCALE=id

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=portfolio
DB_USERNAME=your_database_user
DB_PASSWORD=your_secret

FILESYSTEM_DISK=public
```

Sesuaikan konfigurasi mail, cache, queue, session, dan storage berdasarkan lingkungan.

## Deployment checklist

1. Siapkan PHP extension yang dibutuhkan Laravel dan PostgreSQL (`pdo_pgsql`).
2. Siapkan PostgreSQL database/user dengan privilege minimum.
3. Deploy source code melalui pipeline yang aman.
4. Jalankan `composer install --no-dev --optimize-autoloader`.
5. Build frontend assets sesuai lockfile dan package manager.
6. Atur `.env` di server, bukan di repository.
7. Jalankan migration setelah backup dan verifikasi.
8. Jalankan `php artisan storage:link` bila memakai public disk.
9. Atur permission `storage` dan `bootstrap/cache`.
10. Jalankan config/route/view cache sesuai kebutuhan.
11. Atur document root ke folder `public`.
12. Aktifkan HTTPS.
13. Setup scheduler cron jika ada scheduled task.
14. Setup queue worker jika ada queued jobs.
15. Jalankan smoke test dan verifikasi log.

## Operations

- Backup PostgreSQL secara terjadwal.
- Backup file upload yang diperlukan.
- Uji pemulihan backup.
- Pantau error log dan kapasitas disk.
- Perbarui dependency secara terencana.
- Jangan menampilkan stack trace saat production.
- Batasi akses database dan panel admin.

## Hosting note

Pilih hosting yang mendukung versi PHP, PostgreSQL, document root ke `public`, cron, dan worker jika dibutuhkan. Verifikasi dukungan sebelum membeli layanan. Tidak ada provider berbayar yang diwajibkan oleh dokumen ini.
