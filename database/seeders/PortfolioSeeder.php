<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\ProfileSetting;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Skill;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Admin User
        User::firstOrCreate(
            ['email' => 'anang@example.com'],
            [
                'name' => 'Anang Muhamad Lutfi',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Profile Setting (Singleton)
        ProfileSetting::firstOrCreate(
            ['id' => 1],
            [
                'display_name' => 'Anang Muhamad Lutfi',
                'headline_id' => 'Membangun Sistem Tangguh yang Menghasilkan Dampak Nyata',
                'headline_en' => 'Building Resilient Systems That Drive Real Impact Daily',
                'bio_id' => 'Saya adalah Backend & Web Developer dengan latar belakang Teknik Informatika di Universitas Pamulang. Berfokus pada perancangan sistem web performa tinggi, RESTful API yang aman, arsitektur database PostgreSQL yang terukur, dan rekayasa perangkat lunak modern.',
                'bio_en' => 'I am a Backend & Web Developer with an Informatics background from Universitas Pamulang. Focused on designing high-performance web systems, secure RESTful APIs, scalable PostgreSQL database architectures, and modern software engineering.',
                'location' => 'Tangerang Selatan, Indonesia',
                'email_public' => 'developer@example.com',
                'github_url' => 'https://github.com/AnangML',
                'linkedin_url' => 'https://linkedin.com/in/anang-muhamad-lutfi',
                'availability_status' => true,
                'seo_title_id' => 'Anang Muhamad Lutfi — Backend & Web Developer Portfolio',
                'seo_title_en' => 'Anang Muhamad Lutfi — Backend & Web Developer Portfolio',
                'seo_description_id' => 'Portofolio profesional Anang Muhamad Lutfi, Backend & Web Developer Indonesia.',
                'seo_description_en' => 'Professional portfolio of Anang Muhamad Lutfi, Backend & Web Developer based in Indonesia.',
                'meta' => [
                    'whatsapp' => '081234567890',
                    'education' => 'Universitas Pamulang - Teknik Informatika (Lulus 2026)',
                    'primary_stack' => ['PHP', 'Laravel', 'PostgreSQL', 'Tailwind CSS'],
                ],
            ]
        );

        // 3. Project Categories
        $catWeb = ProjectCategory::firstOrCreate(
            ['slug' => 'web-apps'],
            ['name_id' => 'Aplikasi Web', 'name_en' => 'Web Applications', 'sort_order' => 1]
        );

        $catApi = ProjectCategory::firstOrCreate(
            ['slug' => 'backend-api'],
            ['name_id' => 'Backend & API', 'name_en' => 'Backend & API', 'sort_order' => 2]
        );

        $catFullstack = ProjectCategory::firstOrCreate(
            ['slug' => 'fullstack'],
            ['name_id' => 'Full-Stack', 'name_en' => 'Full-Stack Systems', 'sort_order' => 3]
        );

        $catEcommerce = ProjectCategory::firstOrCreate(
            ['slug' => 'ecommerce'],
            ['name_id' => 'E-Commerce', 'name_en' => 'E-Commerce', 'sort_order' => 4]
        );

        // 4. Technologies
        $techs = [
            'php' => Technology::firstOrCreate(['slug' => 'php'], ['name' => 'PHP 8.3', 'icon_key' => 'php']),
            'laravel' => Technology::firstOrCreate(['slug' => 'laravel'], ['name' => 'Laravel 13', 'icon_key' => 'laravel']),
            'pgsql' => Technology::firstOrCreate(['slug' => 'postgresql'], ['name' => 'PostgreSQL', 'icon_key' => 'postgresql']),
            'mysql' => Technology::firstOrCreate(['slug' => 'mysql'], ['name' => 'MySQL', 'icon_key' => 'mysql']),
            'tailwind' => Technology::firstOrCreate(['slug' => 'tailwind-css'], ['name' => 'Tailwind CSS', 'icon_key' => 'tailwind']),
            'alpine' => Technology::firstOrCreate(['slug' => 'alpine-js'], ['name' => 'Alpine.js', 'icon_key' => 'alpinejs']),
            'rest' => Technology::firstOrCreate(['slug' => 'restful-api'], ['name' => 'RESTful API', 'icon_key' => 'api']),
            'git' => Technology::firstOrCreate(['slug' => 'git'], ['name' => 'Git & GitHub', 'icon_key' => 'git']),
            'nodejs' => Technology::firstOrCreate(['slug' => 'nodejs'], ['name' => 'Node.js', 'icon_key' => 'nodejs']),
            'nextjs' => Technology::firstOrCreate(['slug' => 'nextjs'], ['name' => 'Next.js 15', 'icon_key' => 'nextjs']),
            'typescript' => Technology::firstOrCreate(['slug' => 'typescript'], ['name' => 'TypeScript', 'icon_key' => 'typescript']),
            'midtrans' => Technology::firstOrCreate(['slug' => 'midtrans'], ['name' => 'Midtrans Payment Gateway', 'icon_key' => 'payment']),
            'xendit' => Technology::firstOrCreate(['slug' => 'xendit'], ['name' => 'Xendit Payment Gateway', 'icon_key' => 'payment']),
            'reverb' => Technology::firstOrCreate(['slug' => 'laravel-reverb'], ['name' => 'Laravel Reverb (WebSocket)', 'icon_key' => 'websocket']),
        ];

        // 5. Featured Projects
        $p1 = Project::updateOrCreate(
            ['slug' => 'certificate-list-management'],
            [
                'title_id' => 'Sistem Manajemen Sertifikasi (Certificate List Management)',
                'title_en' => 'Centralized Certificate Management System',
                'summary_id' => 'Platform pengelolaan sertifikat terpusat untuk Lembaga Sertifikasi Profesi (LSP) Universitas Pamulang guna meningkatkan efisiensi waktu percetakan dan validasi berkas.',
                'summary_en' => 'Centralized certificate management platform for Lembaga Sertifikasi Profesi (LSP) Universitas Pamulang, accelerating verification and issuance workflows.',
                'description_id' => "Sistem Manajemen Sertifikasi ini dikembangkan untuk memecahkan kendala operasional dalam pendataan dan penerbitan sertifikat kompetensi mahasiswa di Lembaga Sertifikasi Profesi (LSP) Universitas Pamulang.\n\nSistem ini menyediakan repositori data sertifikat terpusat yang aman, mempermudah pencarian dan validasi keabsahan secara cepat, serta memangkas proses manual percetakan sertifikat secara signifikan sehingga meningkatkan efisiensi waktu staf dan akurasi data.",
                'description_en' => "The Certificate Management System was engineered to resolve manual processing bottlenecks in handling student competency certificates at Lembaga Sertifikasi Profesi (LSP) Universitas Pamulang.\n\nThe platform provides a secure centralized database repository, rapid certificate verification tools, and streamlined batch workflows that drastically reduce physical printing time and ensure data integrity.",
                'role_id' => 'Backend & Database Developer',
                'role_en' => 'Backend & Database Developer',
                'client_name' => 'Lembaga Sertifikasi Profesi (LSP) Universitas Pamulang',
                'project_url' => null,
                'repository_url' => null,
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 1,
                'published_at' => now(),
            ]
        );
        $p1->categories()->sync([$catWeb->id]);
        $p1->technologies()->sync([$techs['laravel']->id, $techs['pgsql']->id, $techs['tailwind']->id]);

        $p2 = Project::updateOrCreate(
            ['slug' => 'sistem-informasi-posyandu-soka'],
            [
                'title_id' => 'Sistem Informasi Posyandu Soka',
                'title_en' => 'Posyandu Soka Community Healthcare System',
                'summary_id' => 'Aplikasi web digitalisasi layanan Posyandu Soka untuk mempermudah pendaftaran pasien, pencatatan jadwal dan hasil pemeriksaan, serta pengelolaan profil posyandu.',
                'summary_en' => 'Digital healthcare web application for Posyandu Soka, streamlining patient registrations, medical checkup records, and clinic administrative workflows.',
                'description_id' => "Aplikasi web yang dibangun untuk memodernisasi operasional pelayanan kesehatan masyarakat di Posyandu Soka.\n\nSistem ini memfasilitasi kader posyandu dalam mengelola profil institusi serta mendigitalisasi rekam data pasien mulai dari pendaftaran pasien baru hingga pencatatan hasil pemeriksaan rutin (anak & lansia), menghadirkan efisiensi waktu, transparansi data, dan kemudahan bagi para kader dalam membuat laporan berkala.",
                'description_en' => "A full-featured web application engineered to modernize community healthcare operations at Posyandu Soka.\n\nThe system enables healthcare volunteers (kader) to maintain clinic profiles, register incoming patients digitally, and record routine medical checkup results, delivering high operational efficiency and effortless periodic health reporting.",
                'role_id' => 'Web Developer',
                'role_en' => 'Web Developer',
                'client_name' => 'Posyandu Soka',
                'project_url' => null,
                'repository_url' => null,
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 2,
                'published_at' => now(),
            ]
        );
        $p2->categories()->sync([$catWeb->id]);
        $p2->technologies()->sync([$techs['nodejs']->id]);

        $p3 = Project::updateOrCreate(
            ['slug' => 'railoka-train-ticket-booking-system'],
            [
                'title_id' => 'RaiLoka — Sistem Pemesanan Tiket Kereta Api Modern & Concurrency-Safe',
                'title_en' => 'RaiLoka — Modern Train Ticket Booking & Concurrency-Safe Platform',
                'summary_id' => 'Platform pemesanan tiket kereta api antarkota berarsitektur Monorepo (Next.js 15 + Laravel 13) dengan mekanisme locking database anti double-booking, pembayaran Midtrans Snap, dan live chat WebSocket.',
                'summary_en' => 'An enterprise monorepo train ticketing platform (Next.js 15 + Laravel 13) featuring ACID concurrency-safe seat locking, Midtrans Snap payments, and real-time WebSocket live chat.',
                'description_id' => "RaiLoka adalah platform pemesanan tiket kereta api antarkota modern berskala enterprise yang mengintegrasikan web client berkecepatan tinggi dengan backend transaksi berkeandalan tinggi (concurrency-safe).\n\n### Masalah Utama yang Diselesaikan:\n1. **Pencegahan Double-Booking Kursi Kereta:**\n   Menggunakan transaksi ACID PostgreSQL dengan mekanisme row-level locking (`SELECT ... FOR UPDATE`) dan batas waktu kuncian sementara (*temporary seat hold* 15 menit), menjamin tidak akan ada perebutan tiket ganda bahkan dalam lonjakan trafik flash-sale.\n2. **Pembayaran Ganda & Idempotensi Finansial:**\n   Integrasi payment gateway Midtrans Snap (QRIS, Virtual Account, E-Wallet) dengan verifikasi signature SHA-512 wajib dan penanganan webhook yang idempoten untuk menjamin nol kehilangan data (zero data loss). Dilengkapi sistem dompet internal (Railoka Wallet) untuk pembayaran instan dan penampung refund otomatis.\n3. **Layanan Pelanggan Real-Time (WebSocket):**\n   Fitur Customer Service Live Chat ditenagai Laravel Reverb yang memungkinkan interaksi sub-detik, melampirkan tiket aktif, dan memfasilitasi pembatalan tiket langsung dari dalam obrolan.\n4. **Validasi Boarding Tanpa Kertas:**\n   Penerbitan e-ticket dengan QR code digital terenkripsi dan aplikasi scanner kamera stasiun (/staff) untuk validasi tiket cepat di pintu gerbang peron.",
                'description_en' => "RaiLoka is an enterprise-grade intercity train ticketing platform built with a high-performance monorepo architecture, combining an ultra-fast client interface with a mission-critical, concurrency-safe transactional backend.\n\n### Key Engineering Highlights & Problem Solutions:\n1. **Zero Double-Booking Seat Concurrency:**\n   Powered by PostgreSQL ACID transactions and row-level locking (`SELECT ... FOR UPDATE`) coupled with a 15-minute temporary seat hold expiration, preventing seat collisions during high-traffic ticketing surges.\n2. **Dual Payments & Idempotent Financial Webhooks:**\n   Seamless Midtrans Snap payment gateway integration (QRIS, Bank Virtual Accounts, E-Wallets) enforced with SHA-512 signature authentication and idempotent webhook dispatchers. Supported by internal Railoka Wallet for 1-click checkout and automatic cancellation refunds.\n3. **Sub-Second Real-Time Support (WebSocket):**\n   Full-duplex Customer Service Live Chat built on Laravel Reverb, enabling passengers to attach active tickets and empowering support staff to execute instant ticket cancellations and refunds within the chat interface.\n4. **Paperless Gate Validation:**\n   Encrypted SVG QR-code boarding passes paired with a camera scanner module for station gate attendants.",
                'role_id' => 'Full-Stack & System Architecture Engineer',
                'role_en' => 'Full-Stack & System Architecture Engineer',
                'client_name' => 'Personal Engineering Project (Production-Ready)',
                'project_url' => null,
                'repository_url' => 'https://github.com/AnangML/Railoka',
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 3,
                'published_at' => now(),
            ]
        );
        $p3->categories()->sync([$catWeb->id, $catFullstack->id]);
        $p3->technologies()->sync([
            $techs['nextjs']->id,
            $techs['typescript']->id,
            $techs['laravel']->id,
            $techs['pgsql']->id,
            $techs['tailwind']->id,
            $techs['reverb']->id,
            $techs['midtrans']->id,
        ]);

        $p4 = Project::updateOrCreate(
            ['slug' => 'ngemil-kukis-artisan-ecommerce'],
            [
                'title_id' => 'NgemilKukis — Platform E-Commerce Kukis Artisanal & Manajemen Operasional Terpadu',
                'title_en' => 'NgemilKukis — Artisan Soft-Baked Cookies Storefront & E-Commerce Management System',
                'summary_id' => 'Platform toko online kukis artisanal modern berbasis Laravel dan Tailwind CSS v4, dilengkapi integrasi Xendit Payment Gateway, program loyalitas Cookie Crumbs, RBAC 4 tingkat, serta Audit Trail terpusat.',
                'summary_en' => 'An artisan soft-baked cookie e-commerce platform built with Laravel and Tailwind CSS v4, featuring Xendit Payment Gateway, Cookie Crumbs loyalty program, 4-tier RBAC, and comprehensive audit trails.',
                'description_id' => "NgemilKukis adalah platform toko online kukis artisanal (*soft-baked cookies*) modern yang dirancang untuk memberikan pengalaman berbelanja interaktif bagi pelanggan serta sistem manajemen operasional internal yang komprehensif bagi pemilik bisnis, tim dapur, dan customer service.\n\n### Fitur Utama & Keunggulan Rekayasa Sistem:\n1. **Storefront Interaktif & Keranjang Reaktif:**\n   Dibangun menggunakan Blade dan Alpine.js dengan *cart drawer* dinamis tanpa *page reload*, filter katalog kategori instan, serta fitur personalisasi kartu ucapan (*gift card hampers*) untuk berbagai momen spesial.\n2. **Proteksi Finansial & Integrasi Xendit Payment Gateway:**\n   Mendukung metode pembayaran otomatis (QRIS, Bank Virtual Account, E-Wallet) yang diverifikasi melalui webhook aman. Dilengkapi mekanisme **Idempotency Key** pada proses checkout untuk mencegah terjadinya pesanan atau penagihan ganda saat koneksi jaringan tidak stabil, serta simulator pembayaran lokal untuk kemudahan demonstrasi.\n3. **Kukis VIP Club & Program Loyalitas \"Cookie Crumbs\":**\n   Mekanisme gamifikasi dan retensi pelanggan otomatis mencakup diskon member instan Rp 10.000, *cashback point* (1 Crumb per Rp 1.000), penukaran poin saat checkout via slider interaktif (potongan hingga 50%), bonus registrasi awal (+50 Crumbs), dan buku besar transaksi poin (*point ledger*).\n4. **Panel Kontrol Berbasis RBAC 4 Tingkat:**\n   Pemisahan hak akses yang ketat (*permission boundaries*) antara **Super Admin** (kelola metrik, staf, settings, log), **Penjual / Dapur** (kelola pesanan dapur, kurir, dan stok produk), **Customer Service** (layanan komplain & catatan pembeli), serta **Pelanggan**.\n5. **Audit Trail & Log Aktivitas Terpusat:**\n   Pencatatan otomatis seluruh aktivitas sistem penting (*auth, order, catalog, settings, staff*) dilengkapi filter multi-kriteria dan modal visual inspeksi diff data JSON (*before & after state*).\n6. **Estetika Desain & Keandalan Kode:**\n   Menerapkan rasio visual profesional 60-30-10 dengan Tailwind CSS v4 serta diverifikasi dengan **61 automated tests (PHPUnit) dengan tingkat kelulusan 100%**.",
                'description_en' => "NgemilKukis is a modern artisan soft-baked cookie e-commerce platform engineered to provide a delightful purchasing journey for customers and a comprehensive operational management backoffice for business owners, kitchen sellers, and customer support.\n\n### Key Engineering Highlights & Problem Solutions:\n1. **Interactive Storefront & Reactive Flyout Cart:**\n   Built with Laravel Blade and Alpine.js featuring a zero-reload cart drawer, category search filters, and an interactive greeting card personalization module for gift hampers.\n2. **Financial Protection & Xendit Payment Gateway:**\n   End-to-end integration supporting automated QRIS, Virtual Accounts, and E-Wallets with secure webhook signature validation. Enhanced with an **Idempotency Key** mechanism during checkout to prevent duplicate orders or double billing during network instability, alongside a built-in local payment simulator for testing.\n3. **Kukis VIP Club & \"Cookie Crumbs\" Loyalty Engine:**\n   Customer retention engine featuring automatic member discounts, cashback points (1 Crumb per Rp 1,000 spent), slider-based checkout redemption (up to 50% discount), onboarding bonuses, and a transparent point transaction ledger.\n4. **4-Tier Role-Based Access Control (RBAC):**\n   Strict permission boundaries isolating **Super Admin** (full system metrics, staff management, branding, audit logs), **Seller / Kitchen** (kitchen processing, dispatch & inventory control), **Customer Service** (order notes & inquiries), and **Customers**.\n5. **Centralized Audit Trail & Activity Logging:**\n   Automatic event tracking covering auth, transactions, catalog updates, and staff alterations, complete with multi-criteria filtering and a visual JSON diff inspection modal.\n6. **Design Harmony & Tested Reliability:**\n   Crafted with Tailwind CSS v4 following the 60-30-10 color rule and validated with **61 automated PHPUnit tests with 100% pass rate**.",
                'role_id' => 'Full-Stack Web Developer & System Designer',
                'role_en' => 'Full-Stack Web Developer & System Designer',
                'client_name' => 'Personal Engineering Project (Production-Ready)',
                'project_url' => null,
                'repository_url' => 'https://github.com/AnangML/NgemilKukis',
                'cover_image_path' => 'projects/ngemil-kukis-cover.png',
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 4,
                'published_at' => now(),
            ]
        );
        $p4->categories()->sync([$catWeb->id, $catFullstack->id, $catEcommerce->id]);
        $p4->technologies()->sync([
            $techs['laravel']->id,
            $techs['php']->id,
            $techs['tailwind']->id,
            $techs['alpine']->id,
            $techs['xendit']->id,
            $techs['mysql']->id,
        ]);

        // 6. Skills
        $skills = [
            ['name' => 'PHP 8.3+', 'category' => 'backend', 'description_id' => 'Object-Oriented Programming, Type safety, Modern PHP features', 'description_en' => 'Object-Oriented Programming, Type safety, Modern PHP features', 'sort_order' => 1],
            ['name' => 'Laravel Framework', 'category' => 'backend', 'description_id' => 'Eloquent ORM, Service Layer, Middleware, Queues, Testing', 'description_en' => 'Eloquent ORM, Service Layer, Middleware, Queues, Testing', 'sort_order' => 2],
            ['name' => 'RESTful API Architecture', 'category' => 'backend', 'description_id' => 'API Versioning, Authentication, Resource Transformers, Rate Limiting', 'description_en' => 'API Versioning, Authentication, Resource Transformers, Rate Limiting', 'sort_order' => 3],
            ['name' => 'PostgreSQL', 'category' => 'database', 'description_id' => 'Relational schemas, JSONB, Indexing, Transaction management', 'description_en' => 'Relational schemas, JSONB, Indexing, Transaction management', 'sort_order' => 4],
            ['name' => 'MySQL', 'category' => 'database', 'description_id' => 'Relational database design, Foreign keys, Query optimization', 'description_en' => 'Relational database design, Foreign keys, Query optimization', 'sort_order' => 5],
            ['name' => 'Tailwind CSS v4', 'category' => 'frontend', 'description_id' => 'Responsive layouts, Dark/Light theming, Modern design tokens', 'description_en' => 'Responsive layouts, Dark/Light theming, Modern design tokens', 'sort_order' => 6],
            ['name' => 'Alpine.js & JavaScript', 'category' => 'frontend', 'description_id' => 'Lightweight interactivity, DOM manipulation, Asynchronous Fetch', 'description_en' => 'Lightweight interactivity, DOM manipulation, Asynchronous Fetch', 'sort_order' => 7],
            ['name' => 'Git & Version Control', 'category' => 'tools', 'description_id' => 'Branching workflows, Pull requests, Git versioning conventions', 'description_en' => 'Branching workflows, Pull requests, Git versioning conventions', 'sort_order' => 8],
        ];

        foreach ($skills as $s) {
            Skill::firstOrCreate(['name' => $s['name']], $s);
        }

        // 7. Experiences
        Experience::firstOrCreate(
            ['organization' => 'Universitas Pamulang'],
            [
                'position_id' => 'Mahasiswa Teknik Informatika',
                'position_en' => 'Computer Science / Informatics Undergraduate',
                'description_id' => 'Mendalami rekayasa perangkat lunak, struktur data dan algoritma, perancangan basis data relasional, dan pengembangan aplikasi berbasis web. Target lulus tahun 2026.',
                'description_en' => 'Studying software engineering, data structures and algorithms, relational database systems, and full-stack web application development. Graduating class of 2026.',
                'location' => 'Kota Serang, Banten',
                'location_type' => 'offline',
                'province' => 'Banten',
                'city' => 'Kota Serang',
                'employment_type' => 'Education',
                'started_at' => '2022-09-01',
                'ended_at' => null,
                'is_current' => true,
                'sort_order' => 1,
            ]
        );

        Experience::firstOrCreate(
            ['organization' => 'SMK N 43 Jakarta'],
            [
                'position_id' => 'Teknik Komputer dan Jaringan',
                'position_en' => 'Computer and Network Engineering',
                'description_id' => 'Pendidikan kejuruan bidang teknik komputer dan jaringan, mempelajari arsitektur komputer, instalasi jaringan, sistem operasi, dan perakitan serta troubleshooting sistem komputer.',
                'description_en' => 'Vocational secondary education focusing on computer hardware, network infrastructure, operating systems, and systems maintenance.',
                'location' => 'Kota Jakarta Selatan, DKI Jakarta',
                'location_type' => 'offline',
                'province' => 'DKI Jakarta',
                'city' => 'Kota Jakarta Selatan',
                'employment_type' => 'Education',
                'started_at' => '2019-07-01',
                'ended_at' => '2022-06-30',
                'is_current' => false,
                'sort_order' => 2,
            ]
        );

        // 8. Post Categories & Initial Engineering Notes
        $catDb = PostCategory::firstOrCreate(['slug' => 'database-performance'], [
            'name_id' => 'PostgreSQL & Performa',
            'name_en' => 'PostgreSQL & Performance',
        ]);

        $catArch = PostCategory::firstOrCreate(['slug' => 'backend-architecture'], [
            'name_id' => 'Arsitektur Backend',
            'name_en' => 'Backend Architecture',
        ]);

        $post1 = Post::firstOrCreate(
            ['slug' => 'indexing-strategies-for-high-volume-relational-queries-in-laravel-12'],
            [
                'title_id' => 'Strategi Indexing untuk Kueri Relasional Volume Tinggi di Laravel 12',
                'title_en' => 'Indexing Strategies for High-Volume Relational Queries in Laravel 12',
                'excerpt_id' => 'Pendalaman partial index, composite B-Tree, dan teknik optimasi kueri JSONB pada database PostgreSQL.',
                'excerpt_en' => 'A deep dive into partial indexes, composite B-Trees, and JSONB query optimization techniques on PostgreSQL.',
                'content_id' => "Ketika menangani jutaan baris data relasional pada PostgreSQL, eksekusi kueri yang lambat sering kali disebabkan oleh full table scan. Artikel ini membahas strategi perancangan index komposit, penggunaan partial index untuk kolom status, dan indexing GIN/GIST pada kolom JSONB.\n\n### 1. Composite B-Tree Index\nMemahami urutan kolom dalam indeks sangat krusial. Letakkan kolom dengan kardinalitas tertinggi atau yang paling sering digunakan dalam klausa WHERE pada posisi terdepan.\n\n### 2. Partial Indexing\nJika tabel menyimpan status (seperti 'pending', 'processed', 'failed'), kita bisa menghemat ukuran index hingga 90% dengan membuat index khusus untuk baris yang belum selesai diproses saja.",
                'content_en' => "When dealing with millions of relational records in PostgreSQL, slow query performance is almost always caused by unnecessary sequential table scans. This article explores composite B-Tree design, partial indexing for state columns, and GIN/GIST indexing for JSONB documents.\n\n### 1. Composite B-Tree Indexing\nColumn ordering within composite indexes matters. Always prioritize columns with high cardinality or those most frequently evaluated in equality WHERE filters.\n\n### 2. Partial Indexing\nIf your table tracks processing states ('pending', 'processed', 'failed'), you can save up to 90% in index overhead by only indexing rows matching specific conditions.",
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ]
        );
        $post1->categories()->sync([$catDb->id]);

        $post2 = Post::firstOrCreate(
            ['slug' => 'designing-idempotent-webhook-handlers-with-zero-data-loss'],
            [
                'title_id' => 'Merancang Penanganan Webhook Idempoten Tanpa Kehilangan Data',
                'title_en' => 'Designing Idempotent Webhook Handlers with Zero Data Loss',
                'excerpt_id' => 'Penerapan concurrency locks, deduplication keys, dan transactional event dispatchers pada layanan kritis.',
                'excerpt_en' => 'Implementing robust concurrency locks, deduplication keys, and transactional event dispatchers in mission-critical services.',
                'content_id' => "Layanan webhook dari payment gateway atau pihak ketiga tidak menjamin pengiriman tepat satu kali (at-most-once). Sering kali terjadi retry otomatis yang memicu duplicate events.\n\n### 1. Idempotency Key & Redis Lock\nGunakan kunci idempoten unik yang disimpan di Redis dengan TTL terukur untuk mencegah proses ganda pada transaksi finansial.\n\n### 2. Database Transactional Outbox\nSimpan payload webhook ke dalam database terlebih dahulu sebelum memicu proses background queue untuk menjamin tidak ada data yang hilang saat worker restart.",
                'content_en' => "Third-party webhook providers cannot guarantee single delivery. Network partitions and automated retries inevitably trigger duplicate events.\n\n### 1. Idempotency Keys & Distributed Locks\nEnforce unique idempotency tokens stored with atomic lock semantics to protect financial mutations from double charging.\n\n### 2. Transactional Outbox Pattern\nPersist incoming webhook payloads to your database before queue dispatching, ensuring zero data loss during broker crashes.",
                'status' => 'published',
                'published_at' => now()->subDays(2),
            ]
        );
        $post2->categories()->sync([$catArch->id]);
    }
}
