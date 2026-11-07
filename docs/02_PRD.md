# 02 — Product Requirements Document (PRD)

## Problem statement

Portfolio statis sering membutuhkan perubahan kode setiap kali pemilik ingin memperbarui proyek, skill, artikel, atau pengalaman. Website yang hanya berisi CV juga kurang memberi konteks tentang proses, kontribusi, dan hasil proyek.

## Product vision

Satu website profesional yang menggabungkan personal branding, showcase proyek, publikasi tulisan, dan kanal komunikasi dalam pengalaman visual editorial yang konsisten.

## Goals dan success metrics

| Goal | Indikator |
|---|---|
| Memperjelas personal brand | Pengunjung dapat menemukan peran, ringkasan, dan CTA di hero |
| Memperlihatkan kualitas proyek | Setiap proyek memiliki detail, kontribusi, stack, dan tautan bila tersedia |
| Memudahkan kontak | Form kontak berhasil divalidasi dan pesan tersimpan |
| Mudah dikelola | Konten dapat dibuat, diedit, dipublish, dan diarsipkan dari admin |
| Mudah ditemukan | Setiap halaman publik memiliki metadata SEO |
| Performa baik | Tidak ada asset besar yang tidak perlu; halaman utama cepat pada koneksi mobile |

Angka target performa/konversi ditetapkan setelah baseline pengukuran, bukan dikarang sebelum website tersedia.

## Personas

### Recruiter
Ingin melihat ringkasan profil, skill, pengalaman, proyek, CV, dan kontak dengan cepat.

### Calon klien/kolaborator
Ingin memahami jenis solusi yang dapat dibuat, kontribusi pemilik, dan cara menghubungi.

### Pemilik website
Ingin mengelola konten bilingual dan melihat ringkasan aktivitas website melalui admin.

## Functional scope

- Homepage hero, highlight project, ringkasan skill, CTA.
- About/profile dan CV.
- Project listing, filter kategori/technology, project detail.
- Skills dan experience.
- Certificates.
- Blog listing, kategori/tag, blog detail.
- Contact form dengan status pesan.
- Bilingual Indonesia/Inggris.
- Dark mode.
- GitHub profile/repository links; integrasi API opsional dan tidak menjadi ketergantungan MVP.
- Download CV PDF.
- SEO metadata, sitemap, robots.
- Visitor analytics first-party yang privacy-conscious.
- Full admin CMS.

## Non-functional scope

- Responsive.
- Accessible keyboard dan reduced motion.
- Secure admin dan contact form.
- Maintainable Laravel code.
- PostgreSQL.
- Tidak bergantung pada API berbayar.
- Bahasa memiliki fallback yang konsisten.

## Prioritas

### Must have
Public pages, CMS admin, bilingual, project detail/filter, contact form, CV download, SEO dasar, security, responsive.

### Should have
Dark mode, blog, certificates, visitor analytics, GitHub links.

### Could have
GitHub API sync, advanced analytics dashboard, search blog, RSS feed, Open Graph image generator.

## MVP acceptance criteria

- Pengunjung dapat melihat semua halaman publik tanpa login.
- Admin dapat login dan mengelola konten utama.
- Project dapat difilter dan dibuka ke halaman detail.
- Konten memiliki versi Indonesia dan Inggris.
- Contact form menyimpan pesan dengan validasi dan proteksi spam.
- CV yang tersedia dapat diunduh.
- Dark mode tidak merusak keterbacaan.
- Metadata title/description dan canonical tersedia.
- Halaman nyaman pada lebar mobile, tablet, dan desktop.
