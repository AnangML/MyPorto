# 03 — Software Requirements Specification (SRS)

## 1. User classes

- Visitor: melihat konten, mengganti bahasa/theme, mengirim pesan, mengunduh CV.
- Administrator: mengelola seluruh konten, media, pesan, pengaturan, dan melihat analytics.
- Optional editor: role terbatas untuk mengelola artikel/proyek jika kelak diperlukan.

## 2. Functional requirements

| ID | Requirement |
|---|---|
| FR-01 | Sistem menampilkan homepage publik |
| FR-02 | Sistem menyediakan halaman About |
| FR-03 | Sistem menampilkan daftar proyek dan filter |
| FR-04 | Sistem menampilkan detail proyek berdasarkan slug |
| FR-05 | Sistem menampilkan skill dan pengalaman |
| FR-06 | Sistem menampilkan sertifikat |
| FR-07 | Sistem menampilkan daftar dan detail blog |
| FR-08 | Sistem menerima pesan melalui contact form |
| FR-09 | Sistem mendukung bahasa Indonesia dan Inggris |
| FR-10 | Sistem menyediakan light/dark mode |
| FR-11 | Sistem menyediakan unduhan CV |
| FR-12 | Sistem menyediakan tautan/informasi GitHub |
| FR-13 | Sistem mencatat statistik kunjungan secara proporsional |
| FR-14 | Admin dapat mengelola konten melalui CMS |
| FR-15 | Sistem menghasilkan metadata SEO dan sitemap |
| FR-16 | Sistem membatasi akses admin berdasarkan role/permission |

## 3. Non-functional requirements

- NFR-01 Security: validasi server-side, CSRF, authorization, rate limit.
- NFR-02 Performance: pagination, eager loading, cache untuk konten publik.
- NFR-03 Availability: website menampilkan error page yang ramah saat gangguan.
- NFR-04 Accessibility: semantic HTML, keyboard focus, contrast, reduced motion.
- NFR-05 Compatibility: browser modern dan responsive.
- NFR-06 Maintainability: migration, test, dokumentasi, dan struktur konsisten.
- NFR-07 Privacy: minimisasi data analytics dan contact.
- NFR-08 Localization: format tanggal dan teks sesuai locale.

## 4. Business rules

- Hanya konten berstatus `published` dan sudah mencapai `published_at` yang tampil publik.
- Slug harus unik dalam resource terkait.
- Proyek dapat ditampilkan sebagai featured atau tidak.
- Konten bilingual boleh memiliki fallback ke bahasa utama jika terjemahan belum tersedia; admin perlu melihat indikator terjemahan belum lengkap.
- Pesan kontak tidak otomatis tampil publik.
- File CV harus aktif sebelum tombol download ditampilkan.
- Analytics tidak boleh menyimpan password, token, atau data sensitif.
- Admin tidak dapat menghapus akun admin terakhir yang aktif.
- Tautan eksternal harus divalidasi dan ditampilkan dengan aman.

## 5. Constraints dan assumptions

- Laravel 12 dan PostgreSQL adalah stack utama.
- Blade adalah renderer frontend.
- Filament digunakan untuk CMS jika versi kompatibel dengan dependency proyek.
- Tidak ada API berbayar yang wajib untuk MVP.
- SMTP untuk email bersifat konfigurasi deployment; jika tidak tersedia, pesan tetap tersimpan di database.
- Informasi profil final disediakan oleh pemilik.
