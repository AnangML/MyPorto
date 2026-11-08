<?php

namespace Tests\Feature;

use App\Models\Training;
use App\Models\User;
use Database\Seeders\PortfolioSeeder;
use Database\Seeders\TrainingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class TrainingManagementTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PortfolioSeeder::class);
        $this->seed(TrainingSeeder::class);
        $this->admin = User::where('email', 'anang@example.com')->firstOrFail();
    }

    public function test_guest_cannot_access_trainings(): void
    {
        $response = $this->get('/admin/trainings');
        $response->assertRedirect('/login');

        $responseCreate = $this->get('/admin/trainings/create');
        $responseCreate->assertRedirect('/login');
    }

    public function test_admin_can_view_trainings_index_and_filters(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/trainings');

        $response->assertStatus(200);
        $response->assertSee('Seminar &amp; Pelatihan', false);
        $response->assertSee('Sertifikasi Kompetensi Pemrogram');
        $response->assertSee('Networking');
        $response->assertSee('DKI Jakarta');
    }

    public function test_admin_can_view_create_training_page(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/trainings/create');

        $response->assertStatus(200);
        $response->assertSee('Input Seminar &amp; Pelatihan Baru', false);
        // Verify all 11 sub-vocations are present
        $response->assertSee('Jaringan Komputer');
        $response->assertSee('Dukungan Teknis');
        $response->assertSee('Teknik Komputer');
        $response->assertSee('Pemrograman');
        $response->assertSee('Multimedia');
        $response->assertSee('Basis Data');
        $response->assertSee('Analis Sistem');
        $response->assertSee('Kecerdasan Buatan');
        $response->assertSee('Hubungan Masyarakat');
        $response->assertSee('Desain Grafis');
        $response->assertSee('Tata Kelola TI');
    }

    public function test_admin_can_store_training_with_regional_cascading_data(): void
    {
        $payload = [
            'title_id' => 'Pelatihan Computer Engineering & IoT Hardware',
            'title_en' => 'Computer Engineering & IoT Hardware Training',
            'organizer' => 'Institut Teknologi Bandung & Kemnaker',
            'vocation' => 'Teknik Komputer dan Informatika',
            'sub_vocation' => 'computer_engineering',
            'type' => 'training',
            'location_type' => 'offline',
            'province' => 'Jawa Barat',
            'city' => 'Kota Bandung',
            'venue_or_platform' => 'Lab IoT Kampus Ganesha',
            'start_date' => '2024-09-01',
            'end_date' => '2024-09-05',
            'certificate_url' => 'https://example.com/cert/12345',
            'description_id' => 'Perancangan mikrokontroler ESP32, sensor telemetri, dan protokol MQTT.',
            'description_en' => 'ESP32 microcontroller design, telemetry sensors, and MQTT protocol.',
            'sort_order' => 10,
            'is_visible' => '1',
        ];

        $response = $this->actingAs($this->admin)->post('/admin/trainings', $payload);

        $response->assertRedirect('/admin/trainings');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('trainings', [
            'title_id' => 'Pelatihan Computer Engineering & IoT Hardware',
            'sub_vocation' => 'computer_engineering',
            'province' => 'Jawa Barat',
            'city' => 'Kota Bandung',
        ]);
    }

    public function test_admin_can_upload_certificate_file(): void
    {
        Storage::fake('public');

        $fakePdf = UploadedFile::fake()->create('sertifikat-pelatihan.pdf', 1024, 'application/pdf');

        $payload = [
            'title_id' => 'Workshop Graphic Design & UI Figma',
            'organizer' => 'Creative Hub Indonesia',
            'vocation' => 'Seni dan Desain Grafis',
            'sub_vocation' => 'graphic_design',
            'type' => 'workshop',
            'location_type' => 'online',
            'venue_or_platform' => 'Zoom & Figma Community',
            'start_date' => '2024-07-20',
            'certificate_file' => $fakePdf,
        ];

        $response = $this->actingAs($this->admin)->post('/admin/trainings', $payload);

        $response->assertRedirect('/admin/trainings');

        $training = Training::where('title_id', 'Workshop Graphic Design & UI Figma')->firstOrFail();
        $this->assertNotNull($training->certificate_file_path);
        Storage::disk('public')->assertExists($training->certificate_file_path);
    }

    public function test_sub_vocation_validation_rejects_unknown_category(): void
    {
        $payload = [
            'title_id' => 'Test Invalid',
            'organizer' => 'Test Org',
            'vocation' => 'IT',
            'sub_vocation' => 'invalid_sub_vocation_name',
            'type' => 'seminar',
            'location_type' => 'offline',
            'start_date' => '2024-01-01',
        ];

        $response = $this->actingAs($this->admin)->post('/admin/trainings', $payload);

        $response->assertSessionHasErrors('sub_vocation');
    }

    public function test_admin_can_update_training(): void
    {
        $training = Training::firstOrFail();

        $payload = [
            'title_id' => 'Judul Seminar Diperbarui',
            'organizer' => $training->organizer,
            'vocation' => $training->vocation,
            'sub_vocation' => 'it_governance',
            'type' => 'certification',
            'location_type' => 'offline',
            'province' => 'DKI Jakarta',
            'city' => 'Kota Jakarta Pusat',
            'start_date' => '2024-04-10',
            'is_visible' => '1',
        ];

        $response = $this->actingAs($this->admin)->put("/admin/trainings/{$training->id}", $payload);

        $response->assertRedirect('/admin/trainings');
        $this->assertDatabaseHas('trainings', [
            'id' => $training->id,
            'title_id' => 'Judul Seminar Diperbarui',
            'sub_vocation' => 'it_governance',
            'city' => 'Kota Jakarta Pusat',
        ]);
    }

    public function test_admin_can_delete_training(): void
    {
        $training = Training::firstOrFail();
        $id = $training->id;

        $response = $this->actingAs($this->admin)->delete("/admin/trainings/{$id}");

        $response->assertRedirect('/admin/trainings');
        $this->assertDatabaseMissing('trainings', ['id' => $id]);
    }
}
