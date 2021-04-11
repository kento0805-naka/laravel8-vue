<?php

namespace Tests\Feature;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    public function setUp(): void {

        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function testLoginPage() {

        $response = $this->get(route('login'));

        $response->assertStatus(200);

        $this->assertGuest();
    }

    public function testLogin(): void {

        $response = $this->withoutMiddleware()->post(route('login'), [
            'email' => $this->user['email'],
            'password' => $this->user['password']
        ]);

        $response->assertStatus(302)
            ->assertRedirect(route('article.index'));
    }

    public function testLogout(): void {

        $this->actingAs($this->user);

        $this->assertAuthenticated();

        $response = $this->withoutMiddleware([VerifyCsrfToken::class])->post(route('logout'));
        //status 419が返ってくる
        $response->assertStatus(419);

    }
}
