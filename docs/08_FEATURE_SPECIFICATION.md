# 08 — Feature Specification

## 1. Home

Sections:
- Navbar: Home, About, Work/Projects, Blog, Contact.
- Availability badge (opsional dan dapat diatur admin).
- Hero headline, short introduction, portrait, CTA.
- Featured projects.
- Skills overview.
- Experience snapshot.
- Contact CTA.
- Footer/social links.

Acceptance:
- Hero menyampaikan role dan value proposition.
- CTA project dan contact berfungsi.
- Konten bilingual.
- Layout responsif dan foto teroptimasi.

## 2. About

- Biografi profesional.
- Pendidikan.
- Minat/fokus.
- CV download.
- Social links.

Jangan menampilkan data pribadi sensitif seperti NIK, alamat rumah, atau nomor identitas.

## 3. Projects

- Grid/list proyek.
- Filter kategori dan teknologi.
- Pagination atau load-more yang accessible.
- Featured badge.
- Detail project dengan challenge, solution, contribution, stack, outcome, gallery, demo/repository.

Project detail sebaiknya memiliki field konten yang dapat dikelola admin. Jangan mengarang angka dampak atau metrik.

## 4. Skills

- Kelompok backend, frontend, database, tools, dan lainnya.
- Urutan dapat diatur admin.
- Tidak wajib memakai progress bar persentase.
- Penjelasan singkat dapat ditampilkan.

## 5. Experience

- Timeline pengalaman, organisasi, peran, periode, lokasi opsional, deskripsi.
- Mendukung pengalaman berjalan.
- Hanya pengalaman yang telah diverifikasi pemilik.

## 6. Certificates

- Nama, penerbit, tanggal, credential ID/link opsional, file/gambar.
- Filter atau pengelompokan opsional.
- File privat tidak boleh dapat diakses tanpa authorization.
- Tampilkan hanya sertifikat yang diizinkan untuk publik.

## 7. Blog

- Daftar artikel, kategori, tanggal publikasi, cover, excerpt.
- Detail artikel dengan typography nyaman.
- Draft, published, archived.
- Slug dan SEO metadata.
- Sanitasi konten rich text/HTML.

## 8. Contact

Fields:
- Name (required).
- Email (required, valid).
- Subject (optional).
- Message (required, batas panjang).
- Honeypot atau mekanisme anti-spam ringan.
- Rate limit.

Pesan disimpan ke database. Email notification opsional; jangan menjadikan SMTP sebagai satu-satunya cara penyimpanan pesan.

## 9. Admin CMS

Resources:
- Profile/settings.
- Projects/categories/technologies.
- Skills.
- Experiences.
- Certificates.
- Posts/categories.
- Contact messages.
- Analytics.
- User/roles jika multi-admin benar-benar dibutuhkan.

Fitur:
- CRUD.
- Search/filter.
- Sort order.
- Draft/publish/archive.
- Media upload.
- Preview.
- Soft delete hanya bila diperlukan.
- Authorization.

## 10. Dark mode

- Toggle manual.
- Persist preference.
- System preference pada first visit.
- Kontras dan warna komponen diuji pada kedua tema.

## 11. GitHub integration

MVP:
- Link GitHub profile.
- Link repository pada project.
- Metadata repository dapat diisi manual.

Optional:
- Fetch public repository metadata.
- Cache response.
- Timeout dan graceful fallback.
- API token hanya di server-side jika diperlukan.
- Jangan membuat website gagal jika GitHub API unavailable.

## 12. CV PDF

- Admin mengunggah PDF CV.
- Validasi MIME dan ukuran.
- Download route memeriksa file aktif.
- Header download aman.
- Versi CV dapat diganti tanpa mengubah kode.
- Jangan generate CV dari data yang belum diverifikasi.

## 13. SEO

- Per-page title dan description.
- Canonical URL.
- Open Graph/Twitter metadata.
- Sitemap XML.
- robots.txt.
- Structured data Person/Article bila datanya valid.
- Slug stabil dan redirect bila slug berubah.
- Alt text gambar.

## 14. Visitor analytics

- Ringkasan page views dan popular pages.
- Filter rentang tanggal.
- Hindari menyimpan data pribadi berlebihan.
- Bot/internal traffic dikecualikan bila dapat dilakukan tanpa fingerprinting invasif.
- Dokumentasikan definisi visitor unik.
- Retensi dan mekanisme opt-out mengikuti kebijakan privasi.

## 15. Bilingual

- Bahasa Indonesia (`id`) dan Inggris (`en`).
- UI labels memakai translation files.
- Konten utama memiliki field dua bahasa.
- Language switch mempertahankan halaman/slug yang sesuai bila tersedia.
- Jika terjemahan tidak ada, fallback ke bahasa utama dengan perilaku konsisten.
- Admin mendapat indikator terjemahan kosong.
