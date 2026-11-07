# 14 — Security and Privacy

## Authentication and admin

- Admin panel wajib authentication.
- Nonaktifkan public registration admin.
- Gunakan password hashing bawaan Laravel.
- Terapkan rate limiting login.
- Gunakan MFA jika tersedia dan sesuai kebutuhan.
- Authorization harus diterapkan pada resource/action, bukan hanya menyembunyikan menu.
- Batasi jumlah akun admin dan gunakan akun individual.

## Contact form

- Validasi semua field di server.
- Terapkan rate limit.
- Gunakan honeypot atau anti-spam ringan.
- Jangan menampilkan email/isi pesan ke publik.
- Escape output.
- Email notification tidak boleh memuat data lebih dari yang diperlukan.

## Uploads

- Validasi MIME, ekstensi, ukuran, dan jenis file.
- Gunakan nama file acak, bukan nama file dari user.
- Jangan izinkan executable.
- Simpan file privat di private disk.
- Jika file publik, gunakan path yang tidak dapat menimpa file lain.
- Validasi ulang saat file diunduh.

## Web security

- CSRF protection untuk form.
- Escape Blade output; sanitasi HTML rich text.
- Gunakan HTTPS.
- Jangan menyimpan secret di repository.
- Batasi CORS jika API ditambahkan.
- Gunakan security headers yang sesuai.
- Update dependency dan audit package.

## Analytics privacy

- Kumpulkan data minimum.
- Hindari fingerprinting.
- Hindari menyimpan IP mentah jika tidak dibutuhkan.
- Dokumentasikan tujuan, retensi, dan akses data.
- Sediakan privacy notice yang mudah ditemukan.
- Batasi analytics dashboard untuk admin.

## Personal information

Jangan tampilkan NIK, nomor identitas, alamat rumah, nomor pribadi, credential, atau dokumen internal pada halaman publik. Pemilik harus menyetujui setiap data kontak dan tautan yang dipublikasikan.

## Incident response

- Cabut credential yang terpapar.
- Periksa log dan cakupan insiden.
- Pulihkan dari backup bersih bila diperlukan.
- Rotasi secret.
- Dokumentasikan penyebab dan tindakan pencegahan.
