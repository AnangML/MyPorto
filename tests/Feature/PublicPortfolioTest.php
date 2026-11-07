<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicPortfolioTest extends TestCase
{
    public function test_homepage_is_accessible_and_renders_hero_section(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Anang Muhamad Lutfi');
        $response->assertSee('Available for new projects');
        $response->assertSee('View My Work');
        $response->assertSee('Let\'s Talk');
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
}

