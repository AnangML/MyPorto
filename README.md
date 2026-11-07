# Personal Developer Portfolio

Dokumentasi perencanaan untuk membangun personal portfolio **Anang Muhamad Lutfi** menggunakan Laravel 12 dan PostgreSQL. Proyek dirancang sebagai website dinamis dengan CMS admin, bilingual Indonesia–Inggris, serta tampilan editorial minimalis berdasarkan gambar referensi.

> Status: Dokumen perencanaan. Detail profil, URL, isi proyek, pengalaman, foto, dan CV harus diverifikasi serta dilengkapi oleh pemilik sebelum publikasi.

## Tujuan

- Menampilkan identitas profesional, keahlian, proyek, pengalaman, sertifikat, dan tulisan.
- Menjadi kanal kontak profesional.
- Menyediakan CMS agar konten dapat dikelola tanpa mengubah kode.
- Menampilkan portofolio yang cepat, responsif, mudah diakses, dan SEO-friendly.

## Tech stack

- Backend: PHP 8.2+ dan Laravel 12
- Database: PostgreSQL
- UI: Blade, Tailwind CSS, Alpine.js
- Admin: Filament (versi yang kompatibel dengan Laravel 12)
- Animasi: CSS transitions dan Intersection Observer; GSAP hanya jika kebutuhan membenarkan dependensi tambahan
- Icons: Lucide
- Testing: Pest atau PHPUnit
- PDF CV: implementasi PDF server-side yang dipilih saat development

## Dokumentasi

| File | Isi |
|---|---|
| `AI_INSTRUCTIONS.md` | Aturan kerja AI coding agent |
| `CODING_STANDARDS.md` | Standar implementasi |
| `docs/01_PROJECT_OVERVIEW.md` | Visi dan ruang lingkup |
| `docs/02_PRD.md` | Kebutuhan produk |
| `docs/03_SRS.md` | Spesifikasi kebutuhan sistem |
| `docs/04_SYSTEM_ARCHITECTURE.md` | Arsitektur teknis |
| `docs/05_DATABASE_SCHEMA.md` | Rancangan database |
| `docs/06_DESIGN_SYSTEM.md` | Sistem desain |
| `docs/07_USER_FLOW.md` | Alur pengguna |
| `docs/08_FEATURE_SPECIFICATION.md` | Detail fitur |
| `docs/09_API_DOCUMENTATION.md` | Kontrak endpoint internal |
| `docs/10_TASK_BREAKDOWN.md` | Tahapan pengerjaan |
| `docs/11_TESTING.md` | Strategi pengujian |
| `docs/12_DEPLOYMENT.md` | Rencana deployment |
| `docs/13_CONTENT_GUIDELINES.md` | Panduan konten bilingual |
| `docs/14_SECURITY_PRIVACY.md` | Keamanan dan privasi |

## Cara menggunakan

1. Letakkan folder dan file ini di root repository.
2. Minta AI membaca `AI_INSTRUCTIONS.md` dan dokumen terkait sebelum melakukan perubahan.
3. Kerjakan proyek per fase berdasarkan `docs/10_TASK_BREAKDOWN.md`.
4. Tandai keputusan yang sudah final dan perbarui dokumen ketika implementasi berubah.
5. Jangan mengisi konten profil, angka pencapaian, pengalaman, atau testimoni dengan data rekaan.

## Keputusan awal

- Arsitektur: dynamic website.
- Admin: full CMS.
- Halaman publik: Home, About, Projects, Skills, Experience, Contact, Certificates, Blog.
- Desain: mengikuti referensi peach/ivory, portrait monochrome, editorial typography, dan pill navigation.
- Foto: foto profesional asli dari pemilik.
- Bahasa: Indonesia dan Inggris.
- Animasi: lembut, singkat, tidak mengganggu aksesibilitas.
