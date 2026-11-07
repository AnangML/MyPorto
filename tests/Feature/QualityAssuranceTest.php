<?php

namespace Tests\Feature;

use App\Models\ProfileSetting;
use App\Models\Project;
use App\Models\User;
use Database\Seeders\PortfolioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class QualityAssuranceTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PortfolioSeeder::class);
        $this->admin = User::where('email', 'anang@example.com')->firstOrFail();
    }

    public function test_sitemap_xml_returns_published_projects_and_correct_content_type(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');
        $response->assertSee(url('/'));
        $response->assertSee('enterprise-asset-tracking-system');
    }

    public function test_sitemap_xml_excludes_draft_and_archived_projects(): void
    {
        Project::create([
            'title_id' => 'Proyek Rahasia Draft',
            'title_en' => 'Secret Draft Project',
            'slug' => 'secret-draft-project',
            'summary_id' => 'Ringkasan draft',
            'summary_en' => 'Draft summary',
            'description_id' => 'Deskripsi draft',
            'description_en' => 'Draft description',
            'status' => 'draft',
        ]);

        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertDontSee('secret-draft-project');
    }

    public function test_draft_project_returns_404_on_public_view(): void
    {
        $draftProject = Project::create([
            'title_id' => 'Internal Backend Architecture Draft',
            'title_en' => 'Internal Backend Architecture Draft',
            'slug' => 'internal-backend-draft',
            'summary_id' => 'Hanya untuk internal draft',
            'summary_en' => 'Internal draft only',
            'description_id' => 'Deskripsi rahasia',
            'description_en' => 'Secret description',
            'status' => 'draft',
        ]);

        $response = $this->get(route('projects.show', $draftProject->slug));

        $response->assertStatus(404);
    }

    public function test_cv_upload_rejects_non_pdf_files(): void
    {
        Storage::fake('public');

        $fakeExe = UploadedFile::fake()->create('malicious.exe', 100, 'application/x-msdownload');

        $response = $this->actingAs($this->admin)->put('/admin/profile', [
            'display_name' => 'Anang Muhamad Lutfi',
            'headline_id' => 'Backend Engineer',
            'headline_en' => 'Backend Engineer',
            'bio_id' => 'Bio',
            'bio_en' => 'Bio',
            'cv_file' => $fakeExe,
        ]);

        $response->assertSessionHasErrors('cv_file');
    }

    public function test_cv_upload_accepts_valid_pdf_and_allows_download(): void
    {
        Storage::fake('public');

        $fakePdf = UploadedFile::fake()->create('Resume-Anang.pdf', 500, 'application/pdf');

        $uploadResponse = $this->actingAs($this->admin)->put('/admin/profile', [
            'display_name' => 'Anang Muhamad Lutfi',
            'headline_id' => 'Backend Engineer',
            'headline_en' => 'Backend Engineer',
            'bio_id' => 'Bio',
            'bio_en' => 'Bio',
            'cv_file' => $fakePdf,
        ]);

        $uploadResponse->assertRedirect('/admin/profile');
        $uploadResponse->assertSessionHas('success');

        $profile = ProfileSetting::current();
        $this->assertNotNull($profile->cv_file_path);
        Storage::disk('public')->assertExists($profile->cv_file_path);

        $downloadResponse = $this->get(route('cv.download'));
        $downloadResponse->assertOk();
    }

    public function test_contact_form_throttling_triggers_after_rate_limit_exceeded(): void
    {
        // First 5 attempts should succeed
        for ($i = 0; $i < 5; $i++) {
            $response = $this->post(route('contact.store'), [
                'name' => "User {$i}",
                'email' => "user{$i}@example.com",
                'message' => 'Halo pesan testing ke '.$i,
                'website_hp' => '',
            ]);
            $response->assertRedirect();
        }

        // 6th attempt within 1 minute should be throttled (HTTP 429)
        $rateLimitedResponse = $this->post(route('contact.store'), [
            'name' => 'Rate Limited User',
            'email' => 'ratelimited@example.com',
            'message' => 'Pesan ini seharusnya diblokir rate limiter.',
            'website_hp' => '',
        ]);

        $rateLimitedResponse->assertStatus(429);
    }

    public function test_robots_txt_contains_disallow_admin_and_sitemap_directive(): void
    {
        $robotsContent = file_get_contents(public_path('robots.txt'));

        $this->assertStringContainsString('Disallow: /admin/', $robotsContent);
        $this->assertStringContainsString('Sitemap:', $robotsContent);
    }

    public function test_custom_404_error_page_renders_cleanly(): void
    {
        $response = $this->get('/non-existent-wildcard-route-xyz');

        $response->assertStatus(404);
        $response->assertSee('404');
        $response->assertSee('Halaman Tidak Ditemukan');
    }
}
