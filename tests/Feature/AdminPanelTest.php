<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\Experience;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\ProfileSetting;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Skill;
use App\Models\Technology;
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

    public function test_admin_can_upload_and_manage_project_cover_image_and_screenshots(): void
    {
        Storage::fake('public');

        $coverFile = UploadedFile::fake()->image('project-mockup.png', 1920, 1080);
        $galleryFile = UploadedFile::fake()->image('project-dashboard.png', 1920, 1080);

        // 1. Create Project with Cover and Gallery Screenshot
        $response = $this->actingAs($this->admin)->post('/admin/projects', [
            'title_id' => 'Platform E-Commerce Modern',
            'title_en' => 'Modern E-Commerce Platform',
            'slug' => 'platform-e-commerce-modern',
            'summary_id' => 'Ringkasan platform toko daring dengan arsitektur microservices.',
            'summary_en' => 'Summary of online store platform with microservices architecture.',
            'description_id' => 'Deskripsi lengkap platform toko online modern dengan integrasi payment gateway.',
            'description_en' => 'Complete description of modern e-commerce platform with payment gateway integration.',
            'status' => 'published',
            'cover_image' => $coverFile,
            'screenshots' => [$galleryFile],
        ]);

        $response->assertRedirect('/admin/projects');

        $project = Project::where('slug', 'platform-e-commerce-modern')->firstOrFail();
        $this->assertNotNull($project->cover_image_path);
        Storage::disk('public')->assertExists($project->cover_image_path);
        $this->assertNotNull($project->cover_image_url);

        $initialCoverPath = $project->cover_image_path;
        $this->assertCount(1, $project->meta['screenshots'] ?? []);
        $galleryPath = $project->meta['screenshots'][0];
        Storage::disk('public')->assertExists($galleryPath);

        // 2. Update with new cover image (replaces old one)
        $newCoverFile = UploadedFile::fake()->image('updated-mockup.png', 1920, 1080);
        $updateResponse = $this->actingAs($this->admin)->put("/admin/projects/{$project->id}", [
            'title_id' => 'Platform E-Commerce Modern',
            'title_en' => 'Modern E-Commerce Platform',
            'slug' => 'platform-e-commerce-modern',
            'summary_id' => 'Ringkasan platform toko daring.',
            'summary_en' => 'Summary of online store platform.',
            'description_id' => 'Deskripsi lengkap platform.',
            'description_en' => 'Complete description.',
            'status' => 'published',
            'cover_image' => $newCoverFile,
        ]);

        $updateResponse->assertRedirect('/admin/projects');
        $project->refresh();

        Storage::disk('public')->assertMissing($initialCoverPath);
        Storage::disk('public')->assertExists($project->cover_image_path);

        // 3. Remove cover image and remove gallery screenshot
        $removeResponse = $this->actingAs($this->admin)->put("/admin/projects/{$project->id}", [
            'title_id' => 'Platform E-Commerce Modern',
            'title_en' => 'Modern E-Commerce Platform',
            'slug' => 'platform-e-commerce-modern',
            'summary_id' => 'Ringkasan platform toko daring.',
            'summary_en' => 'Summary of online store platform.',
            'description_id' => 'Deskripsi lengkap platform.',
            'description_en' => 'Complete description.',
            'status' => 'published',
            'remove_cover_image' => '1',
            'remove_screenshots' => [$galleryPath],
        ]);

        $removeResponse->assertRedirect('/admin/projects');
        $project->refresh();

        $this->assertNull($project->cover_image_path);
        $this->assertNull($project->cover_image_url);
        Storage::disk('public')->assertMissing($galleryPath);
        $this->assertEmpty($project->meta['screenshots'] ?? []);

        // 4. Cleanup on project delete
        $deleteResponse = $this->actingAs($this->admin)->delete("/admin/projects/{$project->id}");
        $deleteResponse->assertRedirect('/admin/projects');
        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }

    public function test_admin_can_create_and_delete_project_category(): void
    {
        $response = $this->actingAs($this->admin)->postJson('/admin/project-categories', [
            'name_id' => 'Kecerdasan Buatan',
            'name_en' => 'Artificial Intelligence',
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'category' => [
                'name_id' => 'Kecerdasan Buatan',
                'name_en' => 'Artificial Intelligence',
                'slug' => 'artificial-intelligence',
            ],
        ]);

        $this->assertDatabaseHas('project_categories', [
            'name_id' => 'Kecerdasan Buatan',
            'slug' => 'artificial-intelligence',
        ]);

        $category = ProjectCategory::where('slug', 'artificial-intelligence')->firstOrFail();

        $deleteResponse = $this->actingAs($this->admin)->deleteJson("/admin/project-categories/{$category->id}");
        $deleteResponse->assertStatus(200);
        $deleteResponse->assertJson(['success' => true]);

        $this->assertDatabaseMissing('project_categories', ['id' => $category->id]);
    }

    public function test_admin_can_create_and_delete_technology(): void
    {
        $response = $this->actingAs($this->admin)->postJson('/admin/technologies', [
            'name' => 'Rust Lang',
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'technology' => [
                'name' => 'Rust Lang',
                'slug' => 'rust-lang',
            ],
        ]);

        $this->assertDatabaseHas('technologies', [
            'name' => 'Rust Lang',
            'slug' => 'rust-lang',
        ]);

        $technology = Technology::where('slug', 'rust-lang')->firstOrFail();

        $deleteResponse = $this->actingAs($this->admin)->deleteJson("/admin/technologies/{$technology->id}");
        $deleteResponse->assertStatus(200);
        $deleteResponse->assertJson(['success' => true]);

        $this->assertDatabaseMissing('technologies', ['id' => $technology->id]);
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

    public function test_admin_can_manage_experience_with_cascading_indonesia_location(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/experiences', [
            'organization' => 'Bank Mandiri Regional Office',
            'position_id' => 'Lead Software Engineer',
            'position_en' => 'Lead Software Engineer',
            'employment_type' => 'Full-time',
            'location_type' => 'offline',
            'province' => 'DKI Jakarta',
            'city' => 'Kota Jakarta Selatan',
            'venue_or_platform' => 'Plaza Mandiri Lt. 12',
            'started_at' => '2025-01-01',
            'is_current' => '1',
            'is_visible' => '1',
        ]);

        $response->assertRedirect('/admin/experiences');
        $this->assertDatabaseHas('experiences', [
            'organization' => 'Bank Mandiri Regional Office',
            'location_type' => 'offline',
            'province' => 'DKI Jakarta',
            'city' => 'Kota Jakarta Selatan',
            'venue_or_platform' => 'Plaza Mandiri Lt. 12',
        ]);

        $experience = Experience::where('organization', 'Bank Mandiri Regional Office')->firstOrFail();
        $this->assertStringContainsString('Jakarta Selatan', $experience->location);
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

    public function test_admin_can_view_posts_index_and_create_pages(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.posts.index'));
        $response->assertStatus(200);
        $response->assertSee('Manajemen Artikel &amp; Engineering Notes', false);

        $createResponse = $this->actingAs($this->admin)->get(route('admin.posts.create'));
        $createResponse->assertStatus(200);
        $createResponse->assertSee('Tulis Artikel Baru');
    }

    public function test_admin_can_create_post_with_cover_image_and_categories(): void
    {
        Storage::fake('public');

        $category = PostCategory::first() ?? PostCategory::create([
            'name_id' => 'Basis Data',
            'name_en' => 'Database',
            'slug' => 'basis-data',
        ]);

        $cover = UploadedFile::fake()->image('post_cover.jpg', 800, 600);

        $response = $this->actingAs($this->admin)->post(route('admin.posts.store'), [
            'title_id' => 'Optimasi Indexing PostgreSQL',
            'title_en' => 'PostgreSQL Indexing Optimization',
            'slug' => 'optimasi-indexing-postgresql',
            'excerpt_id' => 'Panduan mendalam indexing database relasional.',
            'excerpt_en' => 'In-depth guide to relational database indexing.',
            'content_id' => 'Ini adalah konten lengkap artikel mengenai indexing B-Tree dan GIN.',
            'content_en' => 'This is the full content of the article regarding B-Tree and GIN indexing.',
            'cover_image' => $cover,
            'status' => 'published',
            'categories' => [$category->id],
        ]);

        $response->assertRedirect(route('admin.posts.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('posts', [
            'title_id' => 'Optimasi Indexing PostgreSQL',
            'slug' => 'optimasi-indexing-postgresql',
            'status' => 'published',
        ]);

        $post = Post::where('slug', 'optimasi-indexing-postgresql')->firstOrFail();
        $this->assertNotNull($post->cover_image_path);
        Storage::disk('public')->assertExists($post->cover_image_path);
        $this->assertTrue($post->categories->contains($category->id));
        $this->assertNotNull($post->published_at);
    }

    public function test_admin_can_update_post_and_remove_cover(): void
    {
        Storage::fake('public');

        $cover = UploadedFile::fake()->image('cover_initial.jpg');
        $path = $cover->store('posts', 'public');

        $post = Post::create([
            'title_id' => 'Arsitektur Event Driven',
            'title_en' => 'Event Driven Architecture',
            'slug' => 'arsitektur-event-driven',
            'excerpt_id' => 'Ringkasan arsitektur',
            'excerpt_en' => 'Architecture summary',
            'content_id' => 'Konten detail arsitektur.',
            'content_en' => 'Detailed architecture content.',
            'cover_image_path' => $path,
            'status' => 'draft',
        ]);

        $editResponse = $this->actingAs($this->admin)->get(route('admin.posts.edit', $post));
        $editResponse->assertStatus(200);
        $editResponse->assertSee('Arsitektur Event Driven');

        $updateResponse = $this->actingAs($this->admin)->put(route('admin.posts.update', $post), [
            'title_id' => 'Arsitektur Event Driven Terdistribusi',
            'title_en' => 'Distributed Event Driven Architecture',
            'slug' => 'arsitektur-event-driven-terdistribusi',
            'excerpt_id' => 'Ringkasan arsitektur terdistribusi',
            'excerpt_en' => 'Distributed architecture summary',
            'content_id' => 'Konten detail baru.',
            'content_en' => 'New detailed content.',
            'remove_cover_image' => '1',
            'status' => 'published',
        ]);

        $updateResponse->assertRedirect(route('admin.posts.index'));
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title_id' => 'Arsitektur Event Driven Terdistribusi',
            'cover_image_path' => null,
            'status' => 'published',
        ]);
        Storage::disk('public')->assertMissing($path);
    }

    public function test_admin_can_delete_post(): void
    {
        Storage::fake('public');

        $cover = UploadedFile::fake()->image('delete_me.jpg');
        $path = $cover->store('posts', 'public');

        $post = Post::create([
            'title_id' => 'Artikel yang Akan Dihapus',
            'title_en' => 'Article to be Deleted',
            'slug' => 'artikel-akan-dihapus',
            'excerpt_id' => 'Ringkasan',
            'excerpt_en' => 'Summary',
            'content_id' => 'Konten',
            'content_en' => 'Content',
            'cover_image_path' => $path,
            'status' => 'draft',
        ]);

        $response = $this->actingAs($this->admin)->delete(route('admin.posts.destroy', $post));
        $response->assertRedirect(route('admin.posts.index'));
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
        Storage::disk('public')->assertMissing($path);
    }

    public function test_admin_can_create_and_delete_post_category(): void
    {
        $response = $this->actingAs($this->admin)->post(route('admin.post-categories.store'), [
            'name_id' => 'Kecerdasan Buatan',
            'name_en' => 'Artificial Intelligence',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('post_categories', [
            'name_id' => 'Kecerdasan Buatan',
            'slug' => 'artificial-intelligence',
        ]);

        $category = PostCategory::where('slug', 'artificial-intelligence')->firstOrFail();

        // AJAX JSON store response
        $ajaxResponse = $this->actingAs($this->admin)->postJson(route('admin.post-categories.store'), [
            'name_id' => 'Keamanan Sistem',
            'name_en' => 'System Security',
        ]);
        $ajaxResponse->assertStatus(201);
        $ajaxResponse->assertJson([
            'success' => true,
            'category' => [
                'name_id' => 'Keamanan Sistem',
                'name_en' => 'System Security',
            ],
        ]);

        // Delete category
        $deleteResponse = $this->actingAs($this->admin)->delete(route('admin.post-categories.destroy', $category));
        $deleteResponse->assertRedirect();
        $this->assertDatabaseMissing('post_categories', ['id' => $category->id]);
    }

    public function test_admin_can_logout(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/logout');

        $response->assertRedirect('/admin/login');
        $this->assertGuest();
    }
}
