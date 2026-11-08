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
                'email_public' => 'ananglutfi2003@gmail.com',
                'github_url' => 'https://github.com/AnangML',
                'linkedin_url' => 'https://linkedin.com/in/anang-muhamad-lutfi',
                'availability_status' => true,
                'seo_title_id' => 'Anang Muhamad Lutfi — Backend & Web Developer Portfolio',
                'seo_title_en' => 'Anang Muhamad Lutfi — Backend & Web Developer Portfolio',
                'seo_description_id' => 'Portofolio profesional Anang Muhamad Lutfi, Backend & Web Developer Indonesia.',
                'seo_description_en' => 'Professional portfolio of Anang Muhamad Lutfi, Backend & Web Developer based in Indonesia.',
                'meta' => [
                    'whatsapp' => '082121830454',
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
            'nodejs' => Technology::firstOrCreate(['slug' => 'node-js'], ['name' => 'Node.js', 'icon_key' => 'nodejs']),
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
