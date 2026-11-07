# 06 — Design System

## Design direction

Editorial, warm, minimal, premium, personal. Ambil karakter dari referensi: bidang putih/ivory di atas latar peach lembut, navigasi pill, portrait monochrome besar, headline oversized, dan aksen serif italic.

Jangan menyalin foto atau identitas visual pemilik referensi. Gunakan foto profesional milik Anang.

## Color tokens (starting point)

| Token | Hex | Usage |
|---|---|---|
| Peach 50 | `#FFF1ED` | Outer background |
| Peach 100 | `#FBE5DF` | Soft accent |
| Ivory | `#FAF9F7` | Main canvas |
| White | `#FFFFFF` | Cards/surfaces |
| Ink | `#171717` | Primary text |
| Muted | `#737373` | Secondary text |
| Border | `#E7E2DF` | Borders |
| Accent | `#E69A86` | Editorial highlight |
| Accent dark | `#B96F5D` | Accent text where contrast is sufficient |

Pastikan contrast WCAG; jangan gunakan peach pucat untuk teks kecil.

## Dark mode

Dark mode bukan sekadar invert. Gunakan:
- Outer background: deep warm charcoal.
- Canvas: `#1C1B1A`.
- Surface: `#252321`.
- Text: `#F5F1EE`.
- Muted text: `#B9B1AC`.
- Accent: peach yang sedikit lebih terang.

Simpan preferensi theme di localStorage dan hormati `prefers-color-scheme` pada kunjungan pertama.

## Typography

- Sans: Inter, Manrope, atau system sans.
- Serif accent: Instrument Serif atau Playfair Display.
- Headline hero besar, line-height rapat, maksimal sekitar 3 baris pada desktop.
- Serif italic hanya untuk satu frasa penekanan.
- Body copy ringkas dan mudah dipindai.
- Gunakan font lokal/self-hosted jika lisensi dan ukuran memungkinkan; fallback system fonts.

## Layout

- Main canvas berbentuk panel besar dengan radius lembut.
- Navbar pill terpusat pada desktop.
- Hero dua kolom: copy di kiri, portrait di kanan.
- Mobile: stack satu kolom; portrait tidak menutupi teks.
- Content width terbatas dan konsisten.
- Spacing berbasis skala 4/8 px.
- Border tipis, shadow lembut dan jarang.

## Hero content direction

Contoh copy sementara (harus disetujui pemilik):
- Eyebrow: `Available for opportunities`
- Headline: `Building Reliable Digital Experiences` + frasa serif italic.
- Supporting copy: ringkasan singkat tentang backend/web development dan solusi nyata.
- CTA utama: `View My Work`
- CTA sekunder: `Let's Talk`

Jangan mengklaim status “available” jika tidak benar.

## Components

- Pill navigation dengan active state.
- Availability badge.
- Hero headline.
- Primary/secondary CTA.
- Project card dengan image ratio konsisten.
- Skill chips atau grouped skill list.
- Experience timeline.
- Certificate card.
- Blog card.
- Contact form.
- Language switcher.
- Theme switcher.
- Footer.

## Motion and scroll animation

Tujuan: soft, calm, purposeful.
- Reveal: opacity 0 → 1 dan translateY 12–20 px.
- Duration sekitar 450–700 ms.
- Easing ease-out/cubic-bezier lembut.
- Stagger kecil 70–120 ms untuk kelompok item.
- Hindari parallax berat, scroll hijacking, bounce berlebihan, dan animasi setiap elemen.
- Animasi hanya saat masuk viewport; gunakan Intersection Observer.
- Hormati `prefers-reduced-motion: reduce`: matikan transform dan animasi non-esensial.
- Konten harus tetap terlihat jika JavaScript gagal.
- Jangan menunda interaksi atau layout shift karena animasi.

## Responsive breakpoints

Ikuti breakpoint Tailwind secara konsisten. Uji setidaknya:
- Mobile: 360–430 px.
- Tablet: 768 px.
- Laptop: 1024–1440 px.
- Desktop lebar: 1440 px ke atas.

## Accessibility

- Semantic headings dan landmarks.
- Focus-visible yang jelas.
- Label form eksplisit.
- Alt text bermakna.
- Contrast memadai.
- Jangan menyampaikan status hanya dengan warna.
- Semua menu dan kontrol dapat diakses keyboard.
