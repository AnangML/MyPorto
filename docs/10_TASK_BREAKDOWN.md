# 10 — Task Breakdown / Implementation Plan

Urutan kerja disarankan. Jangan mengerjakan semua fitur sekaligus.

## Phase 0 — Discovery and setup

- [ ] Finalisasi nama/domain dan konten profil.
- [ ] Siapkan foto profesional dan CV PDF.
- [ ] Verifikasi seluruh proyek, skill, pengalaman, dan sertifikat.
- [ ] Buat repository dan Laravel 12 app.
- [ ] Konfigurasi PostgreSQL.
- [ ] Setup Tailwind dan Alpine sesuai Laravel 12.
- [ ] Setup testing dan CI dasar.
- [ ] Putuskan versi Filament yang kompatibel.

## Phase 1 — Foundation

- [ ] Buat base layout dan design tokens.
- [ ] Setup localization `id` dan `en`.
- [ ] Setup theme preference.
- [ ] Buat navbar, footer, button, form, card components.
- [ ] Implementasikan responsive shell.
- [ ] Implementasikan soft reveal animation dan reduced motion.

## Phase 2 — Database and admin

- [ ] Buat migrations dan models.
- [ ] Buat factories/seeders untuk development.
- [ ] Setup admin authentication.
- [ ] Setup authorization/roles bila diperlukan.
- [ ] Buat CMS profile/settings.
- [ ] Buat CMS projects, categories, technologies.
- [ ] Buat CMS skills dan experiences.
- [ ] Buat CMS certificates.
- [ ] Buat CMS blog/categories.
- [ ] Buat CMS contact messages.
- [ ] Buat media upload dan validasi.

## Phase 3 — Public pages

- [ ] Home hero dan featured projects.
- [ ] About.
- [ ] Project listing/filter/detail.
- [ ] Skills.
- [ ] Experience.
- [ ] Certificates.
- [ ] Blog listing/detail.
- [ ] Contact form.
- [ ] CV download.

## Phase 4 — Enhancements

- [ ] GitHub links/manual metadata.
- [ ] Optional GitHub API integration.
- [ ] SEO metadata dan sitemap.
- [ ] Visitor analytics first-party.
- [ ] Email notification opsional.
- [ ] Empty/loading/error states.
- [ ] Accessibility review.

## Phase 5 — Quality assurance

- [ ] Feature tests.
- [ ] Authorization tests.
- [ ] Validation and upload tests.
- [ ] Bilingual/fallback tests.
- [ ] Contact spam/rate-limit tests.
- [ ] Responsive testing.
- [ ] Browser testing.
- [ ] Performance audit.
- [ ] Security review.
- [ ] Content proofreading.

## Phase 6 — Deployment

- [ ] Production environment variables.
- [ ] HTTPS.
- [ ] Database backup.
- [ ] Storage permissions.
- [ ] Queue/scheduler setup if used.
- [ ] Cache/config/route optimization.
- [ ] Smoke tests.
- [ ] Monitoring/log rotation.
- [ ] Restore test.

## Suggested first AI task

"Read AI_INSTRUCTIONS.md and the relevant docs. Inspect the existing repository. Do not implement the entire application yet. First report the current project state, dependency compatibility, proposed folder structure, and Phase 0/Phase 1 implementation plan. Ask before making destructive or architecture-changing decisions."
