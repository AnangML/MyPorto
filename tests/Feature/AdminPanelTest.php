<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\Experience;
use App\Models\ProfileSetting;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Database\Seeders\PortfolioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PortfolioSeeder::class);
        $this->admin = User::where('email', 'anang@example.com')->firstOrFail();
    }

    public function test_unauthenticated_user_cannot_access_admin_dashboard(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/login');
    }

    public function test_admin_login_page_renders_successfully(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('Admin CMS Login');
        $response->assertSee('anang@example.com');
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'anang@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/admin');
        $this->assertAuthenticatedAs($this->admin);
    }

    public function test_admin_cannot_login_with_invalid_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'anang@example.com',
            'password' => 'wrong-password-here',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_authenticated_admin_can_view_dashboard_and_metrics(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Dashboard Overview');
        $response->assertSee('Total Proyek');
        $response->assertSee('Skills Matrix');
    }

    public function test_admin_can_update_profile_settings(): void
    {
        $response = $this->actingAs($this->admin)->put('/admin/profile', [
            'display_name' => 'Anang Muhamad Lutfi, S.Kom.',
            'headline_id' => 'Backend & Scalable Systems Engineer',
            'headline_en' => 'Backend & Scalable Systems Engineer',
            'bio_id' => 'Deskripsi profil yang diperbarui dari admin panel.',
            'bio_en' => 'Updated bio description from admin panel.',
            'location' => 'Jakarta / Tangerang Selatan',
            'email_public' => 'anang.updated@example.com',
            'github_url' => 'https://github.com/AnangML',
            'linkedin_url' => 'https://linkedin.com/in/anang-muhamad-lutfi',
            'availability_status' => '1',
        ]);

        $response->assertRedirect('/admin/profile');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('profile_settings', [
            'id' => 1,
            'display_name' => 'Anang Muhamad Lutfi, S.Kom.',
            'email_public' => 'anang.updated@example.com',
        ]);
    }

    public function test_admin_can_upload_and_change_profile_photo(): void
    {
        Storage::fake('public');

        $fakePhoto = UploadedFile::fake()->image('avatar-anang.jpg', 600, 800);

        $response = $this->actingAs($this->admin)->put('/admin/profile', [
            'display_name' => 'Anang Muhamad Lutfi',
            'headline_id' => 'Backend Engineer',
            'headline_en' => 'Backend Engineer',
            'bio_id' => 'Bio profil',
            'bio_en' => 'Profile bio',
            'profile_photo' => $fakePhoto,
        ]);

        $response->assertRedirect('/admin/profile');
        $response->assertSessionHas('success');

        $profile = ProfileSetting::firstOrFail();
        $this->assertNotNull($profile->profile_photo_path);
        Storage::disk('public')->assertExists($profile->profile_photo_path);
        $this->assertStringContainsString('/storage/profile/', $profile->profile_photo_url);
    }

    public function test_admin_can_remove_custom_profile_photo(): void
    {
        Storage::fake('public');

        $profile = ProfileSetting::firstOrFail();
        $fakePath = 'profile/test-photo.jpg';
        Storage::disk('public')->put($fakePath, 'photo-content');
        $profile->update(['profile_photo_path' => $fakePath]);

        $response = $this->actingAs($this->admin)->put('/admin/profile', [
            'display_name' => 'Anang Muhamad Lutfi',
            'headline_id' => 'Backend Engineer',
            'headline_en' => 'Backend Engineer',
            'bio_id' => 'Bio profil',
            'bio_en' => 'Profile bio',
            'remove_profile_photo' => '1',
        ]);

        $response->assertRedirect('/admin/profile');
        $profile->refresh();
        $this->assertNull($profile->profile_photo_path);
        Storage::disk('public')->assertMissing($fakePath);
        $this->assertStringContainsString('images/portrait.jpg', $profile->profile_photo_url);
    }

    public function test_admin_cannot_upload_invalid_profile_photo_format(): void
    {
        Storage::fake('public');

        $invalidFile = UploadedFile::fake()->create('malicious.php', 100, 'text/plain');

        $response = $this->actingAs($this->admin)->put('/admin/profile', [
            'display_name' => 'Anang Muhamad Lutfi',
            'headline_id' => 'Backend Engineer',
            'headline_en' => 'Backend Engineer',
            'bio_id' => 'Bio profil',
            'bio_en' => 'Profile bio',
            'profile_photo' => $invalidFile,
        ]);

        $response->assertSessionHasErrors('profile_photo');
    }

    public function test_admin_can_create_update_and_delete_project(): void
    {
        // 1. Create
        $createResponse = $this->actingAs($this->admin)->post('/admin/projects', [
            'title_id' => 'Sistem Antrean Microservices',
            'title_en' => 'Microservices Queue System',
            'slug' => 'sistem-antrean-microservices',
            'summary_id' => 'Ringkasan sistem antrean berbasis Redis dan PostgreSQL.',
            'summary_en' => 'Summary of Redis and PostgreSQL based queue architecture.',
            'description_id' => 'Penjelasan lengkap arsitektur microservices dan idempotency.',
            'description_en' => 'Detailed explanation of microservices architecture and idempotency.',
            'role_id' => 'Lead Backend Engineer',
            'role_en' => 'Lead Backend Engineer',
            'status' => 'published',
            'is_featured' => '1',
            'sort_order' => 1,
        ]);

        $createResponse->assertRedirect('/admin/projects');
        $this->assertDatabaseHas('projects', [
            'slug' => 'sistem-antrean-microservices',
            'status' => 'published',
        ]);

        $project = Project::where('slug', 'sistem-antrean-microservices')->firstOrFail();

        // 2. Update
        $updateResponse = $this->actingAs($this->admin)->put("/admin/projects/{$project->id}", [
            'title_id' => 'Sistem Antrean Microservices V2',
            'title_en' => 'Microservices Queue System V2',
            'slug' => 'sistem-antrean-microservices-v2',
            'summary_id' => 'Ringkasan sistem yang diperbarui.',
            'summary_en' => 'Updated system summary.',
            'description_id' => 'Penjelasan terbarui.',
            'description_en' => 'Updated explanation.',
            'status' => 'published',
            'is_featured' => '0',
            'sort_order' => 2,
        ]);

        $updateResponse->assertRedirect('/admin/projects');
        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'slug' => 'sistem-antrean-microservices-v2',
            'is_featured' => false,
        ]);

        // 3. Delete
        $deleteResponse = $this->actingAs($this->admin)->delete("/admin/projects/{$project->id}");
        $deleteResponse->assertRedirect('/admin/projects');
        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }

    public function test_admin_can_manage_skills(): void
    {
        // Create Skill
        $createResponse = $this->actingAs($this->admin)->post('/admin/skills', [
            'name' => 'Kafka Streaming',
            'category' => 'backend',
            'description_id' => 'Event driven pub-sub broker',
            'description_en' => 'Event driven pub-sub broker',
            'sort_order' => 10,
            'is_visible' => '1',
        ]);

        $createResponse->assertRedirect('/admin/skills');
        $this->assertDatabaseHas('skills', ['name' => 'Kafka Streaming']);

        $skill = Skill::where('name', 'Kafka Streaming')->firstOrFail();

        // Update Skill
        $updateResponse = $this->actingAs($this->admin)->put("/admin/skills/{$skill->id}", [
            'name' => 'Apache Kafka',
            'category' => 'backend',
            'description_id' => 'High-throughput event streaming',
            'description_en' => 'High-throughput event streaming',
            'sort_order' => 5,
            'is_visible' => '1',
        ]);

        $updateResponse->assertRedirect('/admin/skills');
        $this->assertDatabaseHas('skills', ['id' => $skill->id, 'name' => 'Apache Kafka']);

        // Delete Skill
        $deleteResponse = $this->actingAs($this->admin)->delete("/admin/skills/{$skill->id}");
        $deleteResponse->assertRedirect('/admin/skills');
        $this->assertDatabaseMissing('skills', ['id' => $skill->id]);
    }

    public function test_admin_can_manage_experiences(): void
    {
        // Create Experience
        $createResponse = $this->actingAs($this->admin)->post('/admin/experiences', [
            'organization' => 'Tech Cloud Global',
            'position_id' => 'Senior Backend Engineer',
            'position_en' => 'Senior Backend Engineer',
            'employment_type' => 'Full-time',
            'location' => 'Remote / Jakarta',
            'started_at' => '2025-01-01',
            'is_current' => '1',
            'description_id' => 'Mengembangkan API berskala tinggi.',
            'description_en' => 'Building high-scale APIs.',
            'is_visible' => '1',
        ]);

        $createResponse->assertRedirect('/admin/experiences');
        $this->assertDatabaseHas('experiences', [
            'organization' => 'Tech Cloud Global',
            'is_current' => true,
        ]);

        $experience = Experience::where('organization', 'Tech Cloud Global')->firstOrFail();

        // Update Experience
        $updateResponse = $this->actingAs($this->admin)->put("/admin/experiences/{$experience->id}", [
            'organization' => 'Tech Cloud Global Ltd',
            'position_id' => 'Staff Backend Engineer',
            'position_en' => 'Staff Backend Engineer',
            'started_at' => '2025-01-01',
            'is_current' => '0',
            'ended_at' => '2026-05-01',
            'is_visible' => '1',
        ]);

        $updateResponse->assertRedirect('/admin/experiences');
        $this->assertDatabaseHas('experiences', [
            'id' => $experience->id,
            'organization' => 'Tech Cloud Global Ltd',
            'is_current' => false,
        ]);

        // Delete Experience
        $deleteResponse = $this->actingAs($this->admin)->delete("/admin/experiences/{$experience->id}");
        $deleteResponse->assertRedirect('/admin/experiences');
        $this->assertDatabaseMissing('experiences', ['id' => $experience->id]);
    }

    public function test_admin_can_view_update_status_and_delete_contact_messages(): void
    {
        $message = ContactMessage::create([
            'name' => 'Client Korporat',
            'email' => 'client@corporate.com',
            'subject' => 'Diskusi Arsitektur Sistem Baru',
            'message' => 'Halo Anang, kami ingin menjadwalkan meeting teknis.',
            'status' => 'new',
        ]);

        // Show automatically marks status as read
        $showResponse = $this->actingAs($this->admin)->get("/admin/messages/{$message->id}");
        $showResponse->assertStatus(200);
        $showResponse->assertSee('Client Korporat');
        $this->assertDatabaseHas('contact_messages', [
            'id' => $message->id,
            'status' => 'read',
        ]);

        // Update status to replied
        $statusResponse = $this->actingAs($this->admin)->patch("/admin/messages/{$message->id}/status", [
            'status' => 'replied',
        ]);
        $statusResponse->assertRedirect();
        $this->assertDatabaseHas('contact_messages', [
            'id' => $message->id,
            'status' => 'replied',
        ]);

        // Delete message
        $deleteResponse = $this->actingAs($this->admin)->delete("/admin/messages/{$message->id}");
        $deleteResponse->assertRedirect('/admin/messages');
        $this->assertDatabaseMissing('contact_messages', ['id' => $message->id]);
    }

    public function test_admin_can_logout(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/logout');

        $response->assertRedirect('/admin/login');
        $this->assertGuest();
    }
}
