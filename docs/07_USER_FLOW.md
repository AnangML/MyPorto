# 07 — User Flow

## Public visitor

```mermaid
flowchart TD
    A[Open website] --> B[Home]
    B --> C{Choose destination}
    C --> D[About]
    C --> E[Projects]
    C --> F[Skills / Experience]
    C --> G[Certificates]
    C --> H[Blog]
    C --> I[Contact]
    E --> J[Project detail]
    H --> K[Blog detail]
    I --> L[Submit contact form]
    L --> M[Success / validation feedback]
    B --> N[Download CV]
    B --> O[Switch language / theme]
```

## Admin

```mermaid
flowchart TD
    A[Admin URL] --> B[Login]
    B --> C{Authenticated and authorized?}
    C -- No --> D[Show login / forbidden]
    C -- Yes --> E[Admin dashboard]
    E --> F[Manage profile]
    E --> G[Manage projects]
    E --> H[Manage skills and experience]
    E --> I[Manage certificates]
    E --> J[Manage blog]
    E --> K[Manage contact messages]
    E --> L[View analytics]
    F --> M[Validate and save]
    G --> M
    H --> M
    I --> M
    J --> N[Draft / Preview / Publish]
    K --> O[Update message status]
    L --> P[Review aggregate metrics]
```

## Contact flow

1. Visitor mengisi nama, email, subject opsional, dan pesan.
2. Server memvalidasi input.
3. Rate limiter dan anti-spam memeriksa request.
4. Pesan disimpan.
5. Visitor menerima feedback sukses tanpa membocorkan data internal.
6. Admin melihat pesan di CMS.
7. Notifikasi email admin opsional berdasarkan konfigurasi deployment.

## Content publishing flow

1. Admin membuat draft.
2. Admin mengisi konten Indonesia dan Inggris.
3. Admin mengunggah cover/image bila diperlukan.
4. Admin preview tampilan.
5. Admin publish.
6. Konten muncul pada halaman publik jika status dan waktu publikasi memenuhi aturan.

## Language and theme

- Bahasa default: Indonesia atau berdasarkan konfigurasi situs.
- Pengunjung dapat mengganti ke Inggris.
- Theme default mengikuti preferensi sistem pada kunjungan pertama.
- Preferensi disimpan di browser.
