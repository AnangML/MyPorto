# 11 — Testing Strategy

## Test levels

- Unit: helper/service/business rule.
- Feature: HTTP route, validation, authorization, database interaction.
- Browser/manual: responsive behavior, animation, theme, language, accessibility.
- Security: upload validation, access control, rate limit, XSS/CSRF.

## Core test cases

### Public pages
- Home returns 200.
- Draft/archived project tidak dapat diakses publik.
- Project detail memakai slug yang benar.
- Filter category/technology/search bekerja.
- Pagination bekerja.
- Blog hanya menampilkan published content.

### CMS
- Guest tidak dapat mengakses admin.
- Admin berizin dapat CRUD.
- User tanpa izin ditolak.
- Slug duplicate ditolak.
- Publish state dan published_at dihormati.
- Upload file menolak MIME dan ukuran tidak valid.

### Contact
- Valid request disimpan.
- Invalid email ditolak.
- Field wajib divalidasi.
- Honeypot/rate limit bekerja.
- Pesan tidak tampil ke visitor lain.

### Localization and theme
- Bahasa `id` dan `en` menampilkan UI yang sesuai.
- Fallback translation berjalan.
- Theme toggle berfungsi.
- Preference tersimpan.
- Konten tetap terbaca dalam dark mode.

### CV and SEO
- CV tersedia dapat diunduh.
- CV tidak aktif menghasilkan respons aman.
- Title/description/canonical sesuai halaman.
- Sitemap hanya memasukkan konten published.

### Analytics
- Event/aggregate dihitung sesuai definisi.
- Admin analytics membutuhkan authorization.
- Data sensitif tidak disimpan.
- Retention cleanup berjalan bila dibuat.

## Manual QA matrix

Uji minimal:
- Chrome desktop.
- Firefox atau Edge.
- Android viewport.
- iOS viewport bila tersedia.
- Keyboard-only navigation.
- Reduced-motion preference.
- Light dan dark theme.
- Bahasa Indonesia dan Inggris.

## Definition of release

Tidak ada blocker security; seluruh critical feature tests lulus; konten sudah diverifikasi; backup dan restore telah diuji; tidak ada tautan/CTA utama yang rusak.
