<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\Post;
use App\Models\ProfileSetting;
use App\Models\Project;
use Database\Seeders\PortfolioSeeder;
use Database\Seeders\TrainingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPortfolioTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PortfolioSeeder::class);
        $this->seed(TrainingSeeder::class);
    }

    public function test_homepage_is_accessible_and_renders_hero_section(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Anang Muhamad Lutfi');
        $response->assertSee('Available for new projects');
        $response->assertSee('View My Work');
        $response->assertSee('Let\'s Talk');
        $response->assertSee(route('cv.download'));
        $response->assertSee('Download CV');
    }

    public function test_homepage_hero_renders_dynamic_headline_from_profile_settings(): void
    {
        $profile = ProfileSetting::firstOrFail();
        $profile->update([
            'headline_id' => 'Membangun Ekosistem Tangguh yang Menghasilkan *Karya Nyata*',
            'headline_en' => 'Building Cloud Platforms That Deliver *Exceptional Value*',
        ]);

        // English test
        $responseEn = $this->withSession(['locale' => 'en'])->get('/');
        $responseEn->assertStatus(200);
        $responseEn->assertSee('Building Cloud Platforms That Deliver');
        $responseEn->assertSee('Exceptional Value');

        // Indonesian test
        $responseId = $this->withSession(['locale' => 'id'])->get('/');
        $responseId->assertStatus(200);
        $responseId->assertSee('Membangun Ekosistem Tangguh yang Menghasilkan');
        $responseId->assertSee('Karya Nyata');
    }

    public function test_navbar_contains_scrollspy_sections_and_links(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('data-target="home"', false);
        $response->assertSee('data-target="about"', false);
        $response->assertSee('data-target="work"', false);
        $response->assertSee('data-target="credentials"', false);
        $response->assertSee('data-target="blog"', false);
        $response->assertSee('data-target="contact"', false);
        $response->assertSee('id="home"', false);
        $response->assertSee('id="about"', false);
        $response->assertSee('id="work"', false);
        $response->assertSee('id="credentials"', false);
        $response->assertSee('id="blog"', false);
        $response->assertSee('id="contact"', false);
    }

    public function test_can_switch_locale_to_indonesian(): void
    {
        $switchResponse = $this->get('/locale/id');
        $switchResponse->assertRedirect();
        $switchResponse->assertSessionHas('locale', 'id');

        $homeResponse = $this->withSession(['locale' => 'id'])->get('/');
        $homeResponse->assertStatus(200);
        $homeResponse->assertSee('Tersedia untuk proyek baru');
        $homeResponse->assertSee('Lihat Proyek Saya');
        $homeResponse->assertSee('Unduh CV');
    }

    public function test_invalid_locale_is_ignored(): void
    {
        $response = $this->get('/locale/invalid');
        $response->assertRedirect();
        $response->assertSessionMissing('locale');
    }

    public function test_projects_and_skills_are_rendered_from_database(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Centralized Certificate Management System');
        $response->assertSee('Posyandu Soka Community Healthcare System');
        $response->assertSee('PHP 8.3+');
        $response->assertSee('Universitas Pamulang');
    }

    public function test_both_featured_and_non_featured_published_projects_are_rendered_on_homepage(): void
    {
        // Create a non-featured published project
        $nonFeaturedProject = Project::create([
            'slug' => 'non-featured-api-service',
            'title_id' => 'Layanan API Non Unggulan',
            'title_en' => 'Non Featured API Service',
            'summary_id' => 'Ringkasan layanan API publik.',
            'summary_en' => 'Summary of public API service.',
            'description_id' => 'Deskripsi layanan API publik.',
            'description_en' => 'Description of public API service.',
            'status' => 'published',
            'is_featured' => false,
            'published_at' => now(),
            'sort_order' => 10,
        ]);

        // Create a draft project (should NOT be rendered)
        $draftProject = Project::create([
            'slug' => 'draft-internal-project',
            'title_id' => 'Proyek Rahasia Draft',
            'title_en' => 'Draft Secret Project',
            'summary_id' => 'Ringkasan proyek konsep.',
            'summary_en' => 'Summary of draft project.',
            'description_id' => 'Deskripsi konsep.',
            'description_en' => 'Description of draft.',
            'status' => 'draft',
            'is_featured' => false,
            'sort_order' => 11,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Non Featured API Service');
        $response->assertDontSee('Draft Secret Project');
    }

    public function test_credentials_section_renders_verified_trainings_and_sub_vocations(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('id="credentials"', false);
        $response->assertSee('Badan Nasional Sertifikasi Profesi (BNSP)');
        $response->assertSee('Software Developer Professional Competency Certification');
    }

    public function test_can_view_project_case_study_detail(): void
    {
        $project = Project::where('slug', 'certificate-list-management')->firstOrFail();

        $response = $this->get(route('projects.show', $project->slug));

        $response->assertStatus(200);
        $response->assertSee($project->title);
        $response->assertSee('PostgreSQL');
        $response->assertSee('Backend &amp; Database Developer', false);
        // Verify navbar item 'Karya' is actively highlighted on project detail page
        $response->assertSee('data-target="work" class="nav-spy-link nav-anchor px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-200 bg-blue-600 text-white', false);
    }

    public function test_non_existent_project_returns_404(): void
    {
        $response = $this->get('/projects/unreal-project-slug');

        $response->assertStatus(404);
    }

    public function test_valid_contact_form_submission_is_saved(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Tawaran Proyek Backend',
            'message' => 'Halo Anang, kami tertarik mendiskusikan sistem backend untuk platform kami.',
            'website_hp' => '',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'status' => 'new',
        ]);
    }

    public function test_honeypot_spam_submission_is_silently_dropped(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Spam Bot',
            'email' => 'spambot@example.com',
            'subject' => 'Buy Crypto Now',
            'message' => 'Check out this automated spam link right now!',
            'website_hp' => 'I am a bot filled text',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('contact_messages', [
            'name' => 'Spam Bot',
        ]);
    }

    public function test_invalid_contact_form_submission_fails_validation(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => '',
            'email' => 'not-an-email',
            'message' => 'short',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'message']);
        $this->assertEquals(0, ContactMessage::count());
    }

    public function test_cv_download_route_redirects_when_file_not_uploaded(): void
    {
        $response = $this->get(route('cv.download'));

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('info');
    }

    public function test_homepage_renders_published_articles(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Engineering Notes');
        $response->assertSee('Indexing Strategies for High-Volume Relational Queries in Laravel 12');
    }

    public function test_can_view_published_post_detail_page(): void
    {
        $post = Post::published()->firstOrFail();

        $response = $this->get(route('posts.show', $post->slug));

        $response->assertStatus(200);
        $response->assertSee($post->title);
        $response->assertSee('Kembali ke Engineering Notes');
    }

    public function test_draft_post_returns_404_on_public_route(): void
    {
        $draftPost = Post::create([
            'title_id' => 'Catatan Draft Internal',
            'title_en' => 'Internal Draft Note',
            'slug' => 'catatan-draft-internal',
            'excerpt_id' => 'Draft excerpt',
            'excerpt_en' => 'Draft excerpt en',
            'content_id' => 'Konten rahasia belum terbit',
            'content_en' => 'Secret content not yet published',
            'status' => 'draft',
        ]);

        $response = $this->get(route('posts.show', $draftPost->slug));

        $response->assertStatus(404);
    }

    public function test_sitemap_xml_includes_published_posts(): void
    {
        $post = Post::published()->firstOrFail();

        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');
        $response->assertSee(route('posts.show', $post->slug));
    }
}
