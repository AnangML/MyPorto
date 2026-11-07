# 09 — API / ROUTE DOCUMENTATION

Portfolio ini menggunakan Blade server-rendered. Tidak perlu membuat REST API untuk semua halaman. Dokumen ini mendefinisikan route web dan endpoint JSON internal bila memang dibutuhkan.

## Public web routes (proposed)

| Method | URI | Purpose |
|---|---|---|
| GET | `/` | Home |
| GET | `/about` | About |
| GET | `/projects` | Project listing + filters |
| GET | `/projects/{slug}` | Project detail |
| GET | `/skills` | Skills |
| GET | `/experience` | Experience |
| GET | `/certificates` | Certificates |
| GET | `/blog` | Blog listing |
| GET | `/blog/{slug}` | Blog detail |
| GET | `/contact` | Contact page |
| POST | `/contact` | Submit contact form |
| GET | `/cv` | Download active CV |
| GET | `/language/{locale}` | Change locale (allowlisted) |

Route names dan prefix final harus ditetapkan ketika implementasi.

## Query parameters

`GET /projects`
- `category`: category slug (optional)
- `technology`: technology slug (optional)
- `search`: search term (optional)
- `page`: pagination page

Validasi parameter dan whitelist sort options. Jangan menerima raw SQL/order column dari user.

## Admin routes

Gunakan panel Filament dengan authentication dan authorization. Prefix panel ditentukan saat setup; jangan mengasumsikan `/admin` jika konfigurasi berbeda.

## Optional JSON endpoints

Hanya dibuat jika dibutuhkan untuk interaksi asynchronous:
- `POST /contact` dapat tetap web form biasa; JSON response opsional.
- `GET /api/public/projects` tidak diperlukan untuk MVP Blade.
- Analytics endpoint sebaiknya server-side; jangan membuka endpoint write tanpa rate limit.

## Contact request example

```json
{
  "name": "Visitor Name",
  "email": "visitor@example.com",
  "subject": "Project inquiry",
  "message": "Hello, I would like to discuss..."
}
```

## Contact success response (web)

Redirect back dengan flash message yang generik. Jangan mengembalikan internal IDs atau detail database.

## Error handling

- 404: konten tidak ditemukan atau tidak published.
- 422: validasi gagal.
- 429: rate limit.
- 403: tidak memiliki izin.
- 500: tampilkan pesan aman; detail hanya di log.

## API versioning

Tidak ada public API versioning pada MVP. Jika API publik benar-benar diperlukan kelak, rancang `/api/v1` dengan authentication, throttling, dan dokumentasi terpisah.
