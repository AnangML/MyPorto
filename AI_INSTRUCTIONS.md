# AI Instructions — Portfolio Project

Instruksi ini berlaku untuk AI coding agent yang mengerjakan repository ini.

## 1. Wajib membaca konteks

Sebelum coding, baca:
- `README.md`
- `CODING_STANDARDS.md`
- `docs/01_PROJECT_OVERVIEW.md`
- `docs/02_PRD.md`
- `docs/03_SRS.md`
- `docs/04_SYSTEM_ARCHITECTURE.md`
- `docs/05_DATABASE_SCHEMA.md`
- `docs/06_DESIGN_SYSTEM.md`
- `docs/08_FEATURE_SPECIFICATION.md`
- `docs/14_SECURITY_PRIVACY.md`

Baca dokumen lain sesuai area tugas.

## 2. Prinsip utama

- Periksa kondisi repository dan versi dependency sebelum mengubah kode.
- Jangan mengasumsikan file, tabel, route, package, atau fitur sudah tersedia.
- Ikuti pola Laravel yang sudah digunakan proyek.
- Utamakan solusi sederhana, aman, maintainable, dan sesuai kebutuhan.
- Jangan mengganti stack atau arsitektur tanpa alasan teknis dan persetujuan pemilik.
- Jangan membuat frontend terpisah; gunakan Blade sebagai default.
- Jangan membuat data profil, pengalaman, angka pencapaian, klien, testimoni, atau sertifikat palsu.
- Gunakan placeholder yang jelas jika konten belum tersedia.
- Jangan menaruh secret, token, password, atau private key di source code maupun dokumentasi publik.

## 3. Workflow setiap tugas

1. Pahami permintaan dan acceptance criteria.
2. Periksa file dan implementasi terkait.
3. Sebutkan rencana singkat dan file yang akan terdampak.
4. Implementasikan perubahan sekecil mungkin.
5. Tambahkan atau perbarui migration, validation, authorization, dan test bila relevan.
6. Jalankan formatter, test, dan pemeriksaan yang tersedia.
7. Periksa dampak regresi pada fitur terkait.
8. Laporkan file yang berubah, hasil test, asumsi, dan pekerjaan tersisa.
9. Perbarui dokumentasi jika perilaku sistem atau keputusan teknis berubah.

## 4. Aturan UI/UX

- Ikuti `docs/06_DESIGN_SYSTEM.md`.
- Referensi visual adalah inspirasi arah desain, bukan alasan untuk menyalin identitas, foto, atau aset orang lain.
- Gunakan foto profesional yang disediakan pemilik.
- Jaga tampilan responsive untuk mobile, tablet, dan desktop.
- Animasi harus soft, singkat, tidak berlebihan, dan menghormati `prefers-reduced-motion`.
- Sediakan loading, empty, error, success, dan disabled state.
- Hindari layout generik, gradient berlebihan, glassmorphism berlebihan, dan animasi yang mengganggu.
- Pastikan kontras teks dan fokus keyboard memadai.

## 5. Aturan backend dan database

- Gunakan Form Request untuk validasi request yang kompleks.
- Gunakan Policies/Gates untuk otorisasi.
- Gunakan Eloquent relationships dan eager loading untuk mencegah N+1.
- Gunakan migration untuk semua perubahan schema.
- Gunakan transaksi untuk operasi multi-tabel yang harus atomik.
- Tambahkan index berdasarkan pola query nyata.
- Gunakan pagination untuk daftar panjang.
- Jangan menghapus atau mengubah data produksi secara destruktif.
- Simpan file upload pada storage yang sesuai; validasi MIME, ukuran, dan akses.
- Konten rich text harus disanitasi sebelum dirender.

## 6. Admin CMS

- Semua perubahan konten publik harus membutuhkan autentikasi dan otorisasi admin.
- Jangan membuka registrasi admin publik.
- Gunakan status draft/published dan validasi slug unik.
- Aksi publish, delete, dan perubahan role harus terlindungi.
- Catat aktivitas admin penting bila audit log diimplementasikan.

## 7. Testing

Minimal uji:
- Authentication dan authorization admin.
- CRUD setiap resource CMS.
- Bahasa dan fallback translation.
- Form kontak dan rate limiting.
- Upload file dan validasi.
- Filtering, pagination, dan detail proyek/blog.
- SEO metadata dan halaman 404.
- Responsiveness serta reduced motion melalui pemeriksaan manual.

## 8. Definition of Done

Tugas selesai jika:
- Acceptance criteria terpenuhi.
- Tidak ada error baru yang diketahui.
- Test relevan lulus.
- Validasi dan authorization diterapkan.
- UI mengikuti design system.
- Dokumentasi diperbarui bila perlu.
- Ringkasan perubahan dan keterbatasan dilaporkan.
