<?php

namespace Tests\Feature;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    public function setUp(): void {

        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function testShow() {

        $this->actingAs($this->user);

        $this->assertAuthenticated();

        $response = $this->get(route('users.show', ['name' => $this->user->name]));

        $response->assertStatus(200);
    }

    public function testShowBeforeLogin() {

        $this->assertGuest();

       $response = $this->get(route('users.show', ['name' => 'userName']));
       
       $response->assertStatus(302);
    }
}
