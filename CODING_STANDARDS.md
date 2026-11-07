# Coding Standards

## Laravel / PHP

- Ikuti PSR-12 dan Laravel conventions.
- Gunakan nama class PascalCase, method/property camelCase, konstanta UPPER_SNAKE_CASE.
- Controller tetap tipis; pindahkan logika domain yang kompleks ke Action/Service.
- Gunakan Form Request untuk validasi.
- Gunakan Resource/DTO bila membantu konsistensi output.
- Hindari repository pattern jika hanya membungkus Eloquent tanpa nilai tambah.
- Gunakan dependency injection, bukan akses service secara tersebar.
- Jangan menelan exception; log dan tangani secara tepat.
- Gunakan `config()` di aplikasi, bukan `env()` di luar file config.

## Database

- Nama tabel plural snake_case.
- Foreign key memakai `{singular}_id`.
- Tentukan nullability, default, unique, dan index secara eksplisit.
- Simpan waktu menggunakan timestamp yang konsisten; tampilkan sesuai timezone pengguna.
- Gunakan soft deletes hanya bila pemulihan data memang dibutuhkan.

## Blade / frontend

- Pecah UI menjadi Blade components yang reusable.
- Hindari logika bisnis kompleks di Blade.
- Gunakan semantic HTML.
- Gunakan Alpine.js hanya untuk interaksi ringan.
- Gunakan Tailwind utility secara konsisten; ekstrak komponen bila pola berulang.
- Jangan memasukkan HTML dari pengguna tanpa sanitasi.
- Pastikan semua form memiliki label dan error state.

## Git

- Gunakan commit kecil dan deskriptif, misalnya `feat: add project filtering`.
- Jangan commit `.env`, credential, file cache, atau file upload privat.
- Pull request/merge request menjelaskan tujuan, perubahan, test, dan screenshot UI bila relevan.

## Quality

- Tambahkan test untuk business rules dan bug fixes.
- Hindari query berulang di loop.
- Gunakan pagination untuk koleksi publik/admin.
- Jangan mengoptimasi prematur; ukur bottleneck terlebih dahulu.
