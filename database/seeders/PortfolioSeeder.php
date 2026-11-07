<?php

namespace Database\Seeders;

use App\Models\Experience;
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
                'email_public' => 'anang.developer@example.com',
                'github_url' => 'https://github.com/AnangML',
                'linkedin_url' => 'https://linkedin.com/in/anang-muhamad-lutfi',
                'availability_status' => true,
                'seo_title_id' => 'Anang Muhamad Lutfi — Backend & Web Developer Portfolio',
                'seo_title_en' => 'Anang Muhamad Lutfi — Backend & Web Developer Portfolio',
                'seo_description_id' => 'Portofolio profesional Anang Muhamad Lutfi, Backend & Web Developer Indonesia.',
                'seo_description_en' => 'Professional portfolio of Anang Muhamad Lutfi, Backend & Web Developer based in Indonesia.',
                'meta' => [
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

        // 4. Technologies
        $techs = [
            'php' => Technology::firstOrCreate(['slug' => 'php'], ['name' => 'PHP 8.3', 'icon_key' => 'php']),
            'laravel' => Technology::firstOrCreate(['slug' => 'laravel'], ['name' => 'Laravel 12', 'icon_key' => 'laravel']),
            'pgsql' => Technology::firstOrCreate(['slug' => 'postgresql'], ['name' => 'PostgreSQL', 'icon_key' => 'postgresql']),
            'mysql' => Technology::firstOrCreate(['slug' => 'mysql'], ['name' => 'MySQL', 'icon_key' => 'mysql']),
            'tailwind' => Technology::firstOrCreate(['slug' => 'tailwind-css'], ['name' => 'Tailwind CSS', 'icon_key' => 'tailwind']),
            'alpine' => Technology::firstOrCreate(['slug' => 'alpine-js'], ['name' => 'Alpine.js', 'icon_key' => 'alpinejs']),
            'rest' => Technology::firstOrCreate(['slug' => 'restful-api'], ['name' => 'RESTful API', 'icon_key' => 'api']),
            'git' => Technology::firstOrCreate(['slug' => 'git'], ['name' => 'Git & GitHub', 'icon_key' => 'git']),
        ];

        // 5. Featured Projects
        $p1 = Project::firstOrCreate(
            ['slug' => 'enterprise-asset-tracking-system'],
            [
                'title_id' => 'Sistem Manajemen & Pelacakan Aset Perusahaan',
                'title_en' => 'Enterprise Asset Management & Tracking System',
                'summary_id' => 'Arsitektur backend tangguh dengan pelaporan otomatis dan manajemen hak akses berbasis peran (RBAC).',
                'summary_en' => 'High-performance backend architecture with automated reporting and role-based access control (RBAC).',
                'description_id' => 'Aplikasi manajemen aset komprehensif yang dirancang untuk mengelola siklus hidup aset perusahaan secara efisien. Menggunakan database PostgreSQL dengan indexing teroptimasi untuk menangani ribuan pencatatan inventaris secara instan.',
                'description_en' => 'A comprehensive asset management platform designed to manage enterprise asset lifecycles efficiently. Powered by PostgreSQL with optimized indexing to handle thousands of inventory records seamlessly.',
                'role_id' => 'Lead Backend Engineer',
                'role_en' => 'Lead Backend Engineer',
                'client_name' => 'Internal Enterprise Project',
                'project_url' => 'https://example.com/demo-asset',
                'repository_url' => 'https://github.com/AnangML',
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 1,
                'started_at' => '2025-01-10',
                'completed_at' => '2025-06-20',
                'published_at' => now(),
            ]
        );
        $p1->categories()->sync([$catWeb->id, $catFullstack->id]);
        $p1->technologies()->sync([$techs['laravel']->id, $techs['pgsql']->id, $techs['tailwind']->id]);

        $p2 = Project::firstOrCreate(
            ['slug' => 'real-time-payment-gateway-service'],
            [
                'title_id' => 'Layanan Gateway Pembayaran & Integrasi Webhook',
                'title_en' => 'Real-Time Payment Gateway & Webhook Service',
                'summary_id' => 'Mesin pemrosesan transaksi skalabel dengan mekanisme dispatch webhook asinkron dan audit logging.',
                'summary_en' => 'Scalable transaction processing engine with asynchronous webhook dispatching and comprehensive audit logging.',
                'description_id' => 'Layanan API backend mikro yang mengamankan transaksi pembayaran dengan validasi idempotency key, verifikasi HMAC signature, dan queue worker otomatis untuk menjamin keandalan data finansial.',
                'description_en' => 'A micro backend API service that secures payment transactions with idempotency keys, HMAC signature verification, and automated background queue workers ensuring zero data loss.',
                'role_id' => 'Backend API Developer',
                'role_en' => 'Backend API Developer',
                'client_name' => 'Fintech Solution Integration',
                'project_url' => 'https://example.com/demo-payment',
                'repository_url' => 'https://github.com/AnangML',
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 2,
                'started_at' => '2025-07-01',
                'completed_at' => '2025-11-15',
                'published_at' => now(),
            ]
        );
        $p2->categories()->sync([$catApi->id]);
        $p2->technologies()->sync([$techs['php']->id, $techs['laravel']->id, $techs['pgsql']->id, $techs['rest']->id]);

        $p3 = Project::firstOrCreate(
            ['slug' => 'privacy-first-analytics-dashboard'],
            [
                'title_id' => 'Dashboard Analitik Kunjungan Berorientasi Privasi',
                'title_en' => 'Privacy-First Web Analytics & Reporting Engine',
                'summary_id' => 'Visualisasi analitik responsif dan ringan yang dirancang dengan agregasi metrik ramah privasi.',
                'summary_en' => 'Lightweight, responsive analytics visualization designed with first-party privacy metrics aggregation.',
                'description_id' => 'Engine statistik berbasis web untuk memantau metrik pengunjung secara real-time tanpa pelacak pihak ketiga. Menghitung data agregasi harian secara efisien dengan kueri PostgreSQL yang dioptimasi.',
                'description_en' => 'A web-based analytics engine tracking visitor metrics in real-time without third-party invasive trackers. Aggregates daily views efficiently using optimized PostgreSQL queries.',
                'role_id' => 'Full-Stack Developer',
                'role_en' => 'Full-Stack Developer',
                'client_name' => 'Open Source Tool',
                'project_url' => 'https://example.com/demo-analytics',
                'repository_url' => 'https://github.com/AnangML',
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 3,
                'started_at' => '2026-01-05',
                'completed_at' => '2026-04-10',
                'published_at' => now(),
            ]
        );
        $p3->categories()->sync([$catWeb->id, $catFullstack->id]);
        $p3->technologies()->sync([$techs['laravel']->id, $techs['tailwind']->id, $techs['alpine']->id, $techs['pgsql']->id]);

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
                'location' => 'Tangerang Selatan, Indonesia',
                'employment_type' => 'Education',
                'started_at' => '2022-09-01',
                'ended_at' => '2026-08-31',
                'is_current' => true,
                'sort_order' => 1,
            ]
        );

        Experience::firstOrCreate(
            ['organization' => 'Independent / Freelance Projects'],
            [
                'position_id' => 'Backend & Web Developer',
                'position_en' => 'Backend & Web Developer',
                'description_id' => 'Merancang dan mengimplementasikan aplikasi web berbasis Laravel dan PostgreSQL untuk berbagai kebutuhan klien, mulai dari sistem inventaris internal hingga API gateway.',
                'description_en' => 'Designing and implementing web applications powered by Laravel and PostgreSQL for client initiatives, ranging from internal tracking platforms to RESTful API services.',
                'location' => 'Remote',
                'employment_type' => 'Freelance',
                'started_at' => '2024-01-01',
                'ended_at' => null,
                'is_current' => true,
                'sort_order' => 2,
            ]
        );
    }
}
