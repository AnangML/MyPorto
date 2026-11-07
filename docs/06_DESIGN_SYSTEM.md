# 06 — Design System

## Design direction

Editorial, modern, minimal, premium, tech-focused. Mengikuti karakter dari gambar referensi: kanvas putih bersih (pure white), navigasi pill terpusat (frosted glass), portrait monochrome dengan smooth bottom fade, headline oversized, dan aksen kata serif italic dengan sentuhan warna biru elektrik (tech royal blue).

Jangan menyalin foto atau identitas visual pemilik referensi. Gunakan foto profesional milik Anang.

## Color tokens (White & Blue Theme)

| Token | Hex | Usage |
|---|---|---|
| Background Canvas | `#FFFFFF` | Latar utama (Pure White) |
| Blue 50 | `#EFF6FF` | Soft blue badge & highlight background |
| Blue 200 | `#BFDBFE` | Subtle blue border |
| Brand Blue (Primary) | `#2563EB` | Aksen tombol utama, aksen serif italic, link aktif |
| Blue Dark | `#1D4ED8` | Hover state tombol utama |
| Text Main | `#0F172A` | Teks judul & konten utama (Slate 900) |
| Text Muted | `#64748B` | Teks sekunder, deskripsi & caption (Slate 500) |
| Border | `#E2E8F0` | Garis batas tipis & divider (Slate 200) |

Pastikan contrast WCAG; gunakan teks kontras tinggi untuk kenyamanan membaca.

## Dark mode

Dark mode dirancang bernuansa deep midnight tech:
- Background utama: `#0A0F1D` (Deep Midnight Charcoal)
- Surface / Cards: `#1E293B` (Slate 800)
- Text utama: `#F8FAFC` (Slate 50)
- Muted text: `#94A3B8` (Slate 400)
- Accent: `#38BDF8` / `#60A5FA` (Electric Sky Blue)

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
