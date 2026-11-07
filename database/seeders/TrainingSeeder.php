<?php

namespace Database\Seeders;

use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainings = [
            [
                'title_id' => 'Pelatihan Arsitektur Enterprise Backend & Microservices Berbasis Laravel & Go',
                'title_en' => 'Enterprise Backend & Microservices Architecture with Laravel & Go',
                'organizer' => 'BPSDM Kementerian Komunikasi dan Digital RI (Komdigi)',
                'vocation' => 'Teknologi Informasi dan Komunikasi',
                'sub_vocation' => 'programming',
                'type' => 'training',
                'location_type' => 'offline',
                'province' => 'DKI Jakarta',
                'city' => 'Kota Jakarta Selatan',
                'venue_or_platform' => 'Pusdiklat BPSDM Komdigi Jakarta',
                'start_date' => Carbon::parse('2024-08-10'),
                'end_date' => Carbon::parse('2024-08-24'),
                'certificate_url' => 'https://digitalent.komdigi.go.id/verify/DT-2024-BE-88921',
                'description_id' => 'Pendalaman arsitektur REST API skala besar, distributed caching Redis, event-driven pattern, query optimization PostgreSQL, dan deployment Docker.',
                'description_en' => 'In-depth enterprise REST APIs, Redis distributed caching, event-driven patterns, PostgreSQL performance tuning, and Docker deployment.',
                'sort_order' => 1,
                'is_visible' => true,
            ],
            [
                'title_id' => 'Seminar Nasional: Infrastruktur Jaringan Enterprise & Keamanan Firewall Next-Gen',
                'title_en' => 'National Seminar: Enterprise Network Infrastructure & Next-Gen Firewall Security',
                'organizer' => 'MikroTik Academy & Asosiasi Penyelenggara Jasa Internet Indonesia (APJII)',
                'vocation' => 'Teknik Komputer dan Informatika',
                'sub_vocation' => 'networking',
                'type' => 'seminar',
                'location_type' => 'offline',
                'province' => 'Banten',
                'city' => 'Kota Tangerang Selatan',
                'venue_or_platform' => 'Auditorium Utama Universitas Pamulang Lt. 8',
                'start_date' => Carbon::parse('2024-05-18'),
                'end_date' => Carbon::parse('2024-05-18'),
                'certificate_url' => 'https://apjii.or.id/certificates/APJII-NET-2024-551',
                'description_id' => 'Konfigurasi enterprise routing BGP/OSPF, implementasi IDS/IPS, mitigasi serangan DDoS, dan topologi high-availability data center.',
                'description_en' => 'Enterprise BGP/OSPF routing setups, IDS/IPS implementations, DDoS mitigation strategies, and high-availability data center topologies.',
                'sort_order' => 2,
                'is_visible' => true,
            ],
            [
                'title_id' => 'Workshop Intensive: Penerapan Generative AI & Large Language Models di Sistem Web',
                'title_en' => 'Intensive Workshop: Generative AI & LLM Integration in Modern Web Systems',
                'organizer' => 'Dicoding Indonesia & Google Developer Student Clubs',
                'vocation' => 'Teknologi Informasi dan Komunikasi',
                'sub_vocation' => 'artificial_intelligence',
                'type' => 'training',
                'location_type' => 'online',
                'province' => null,
                'city' => null,
                'venue_or_platform' => 'Zoom Meeting & Dicoding Classroom',
                'start_date' => Carbon::parse('2024-03-02'),
                'end_date' => Carbon::parse('2024-03-09'),
                'certificate_url' => 'https://dicoding.com/certificates/GENAI-WEB-77319',
                'description_id' => 'Integrasi Gemini API, vector database pgvector di PostgreSQL, embedding similarity search, dan prompt engineering untuk otomatisasi sistem.',
                'description_en' => 'Gemini API integration, PostgreSQL pgvector embeddings, similarity search, and automated prompt engineering workflows.',
                'sort_order' => 3,
                'is_visible' => true,
            ],
            [
                'title_id' => 'Pelatihan & Sertifikasi System Analyst: Software Architecture & UML Modeling',
                'title_en' => 'System Analyst Certification: Software Architecture & UML Modeling',
                'organizer' => 'Lembaga Sertifikasi Profesi Informatika (LSP BNSP)',
                'vocation' => 'Teknologi Informasi dan Komunikasi',
                'sub_vocation' => 'system_analyst',
                'type' => 'certification',
                'location_type' => 'offline',
                'province' => 'Jawa Barat',
                'city' => 'Kota Bandung',
                'venue_or_platform' => 'Gedung Pusat TIK Bandung',
                'start_date' => Carbon::parse('2023-11-14'),
                'end_date' => Carbon::parse('2023-11-16'),
                'certificate_url' => 'https://bnsp.go.id/sertifikasi/BNSP-LSP-SYS-2023-412',
                'description_id' => 'Analisis kebutuhan sistem, pemodelan data entity diagram (ERD), Activity/Sequence Diagram UML, Software Requirement Specification (SRS).',
                'description_en' => 'System requirements analysis, ERD data modeling, UML sequence/activity diagrams, and Software Requirement Specification (SRS) documentation.',
                'sort_order' => 4,
                'is_visible' => true,
            ],
        ];

        foreach ($trainings as $training) {
            Training::updateOrCreate(
                [
                    'title_id' => $training['title_id'],
                    'organizer' => $training['organizer'],
                ],
                $training
            );
        }
    }
}
