<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\Project;
use Database\Seeders\PortfolioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPortfolioTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PortfolioSeeder::class);
    }

    public function test_homepage_is_accessible_and_renders_hero_section(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Anang Muhamad Lutfi');
        $response->assertSee('Available for new projects');
        $response->assertSee('View My Work');
        $response->assertSee('Let\'s Talk');
    }

    public function test_navbar_contains_scrollspy_sections_and_links(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('data-target="home"', false);
        $response->assertSee('data-target="about"', false);
        $response->assertSee('data-target="work"', false);
        $response->assertSee('data-target="blog"', false);
        $response->assertSee('data-target="contact"', false);
        $response->assertSee('id="home"', false);
        $response->assertSee('id="about"', false);
        $response->assertSee('id="work"', false);
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
        $response->assertSee('Enterprise Asset Management & Tracking System');
        $response->assertSee('Real-Time Payment Gateway & Webhook Service');
        $response->assertSee('PHP 8.3+');
        $response->assertSee('Universitas Pamulang');
    }

    public function test_can_view_project_case_study_detail(): void
    {
        $project = Project::where('slug', 'enterprise-asset-tracking-system')->firstOrFail();

        $response = $this->get(route('projects.show', $project->slug));

        $response->assertStatus(200);
        $response->assertSee($project->title);
        $response->assertSee('PostgreSQL');
        $response->assertSee('Lead Backend Engineer');
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
}
