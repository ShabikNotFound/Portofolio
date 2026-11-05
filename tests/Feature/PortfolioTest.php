<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;

    public function test_portfolio_page_loads_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Shabik Sholahudin');
        $response->assertSee('Mahasiswa UBSI Kota Tasikmalaya');
        $response->assertSee('Divisi Litbang 2024/2026');
        $response->assertSee('081563346921');
        $response->assertSee('shabiksholahudin@gmail.com');
    }

    public function test_cv_print_page_loads_successfully(): void
    {
        $response = $this->get('/cv-print');

        $response->assertStatus(200);
        $response->assertSee('Shabik Sholahudin');
        $response->assertSee('Curriculum Vitae');
        $response->assertSee('Rajapolah, Tasikmalaya');
    }

    public function test_contact_form_submits_and_saves_to_database(): void
    {
        $payload = [
            'name' => 'Recruiter Cyber Corp',
            'email' => 'hr@cybercorp.id',
            'subject' => 'Tawaran Magang Web Developer',
            'message' => 'Halo Shabik, kami tertarik dengan portofolio semi-cyberpunk Anda dan ingin menawarkan posisi magang.',
        ];

        $response = $this->postJson('/contact', $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Recruiter Cyber Corp',
            'email' => 'hr@cybercorp.id',
            'subject' => 'Tawaran Magang Web Developer',
        ]);
    }
}
