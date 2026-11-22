<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\PortfolioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SecurityHardeningTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PortfolioSeeder::class);
        $this->admin = User::where('email', 'anang@example.com')->firstOrFail();
    }

    public function test_open_redirect_is_prevented_on_locale_switcher(): void
    {
        $response = $this->withHeaders([
            'Referer' => 'https://evil.com/phishing',
        ])->get(route('locale.switch', 'en'));

        $response->assertRedirect(route('home'));
        $this->assertStringNotContainsString('evil.com', (string) $response->headers->get('Location'));
    }

    public function test_valid_internal_redirect_is_preserved_on_locale_switcher(): void
    {
        $response = $this->withHeaders([
            'Referer' => url('/projects/certificate-list-management'),
        ])->get(route('locale.switch', 'id'));

        $response->assertRedirect(url('/projects/certificate-list-management'));
    }

    public function test_open_redirect_is_prevented_on_contact_submission(): void
    {
        $response = $this->withHeaders([
            'Referer' => 'https://evil.com/target',
        ])->post(route('contact.store'), [
            'name' => 'Security Tester',
            'email' => 'tester@example.com',
            'subject' => 'Inquiry',
            'message' => 'Valid message with more than ten characters.',
        ]);

        $response->assertRedirect(route('home').'#contact');
        $this->assertStringNotContainsString('evil.com', (string) $response->headers->get('Location'));
    }

    public function test_http_security_headers_are_attached_to_responses(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->assertHeader('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
    }

    public function test_svg_file_upload_is_rejected_for_project_cover_image(): void
    {
        Storage::fake('public');

        $svgFile = UploadedFile::fake()->create('malicious.svg', 100, 'image/svg+xml');

        $response = $this->actingAs($this->admin)->post(route('admin.projects.store'), [
            'title_id' => 'Proyek Uji SVG',
            'title_en' => 'SVG Test Project',
            'summary_id' => 'Ringkasan uji',
            'summary_en' => 'Test summary',
            'description_id' => 'Deskripsi uji',
            'description_en' => 'Test description',
            'status' => 'draft',
            'cover_image' => $svgFile,
        ]);

        $response->assertSessionHasErrors('cover_image');
    }
}
