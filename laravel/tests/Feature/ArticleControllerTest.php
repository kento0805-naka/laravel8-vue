<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void {

        parent::setUp();

        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function testIndex() {
        
        $response = $this->get(route('article.index'));

        $response->assertStatus(200)->assertViewIs('articles.index');
    }

    public function testStore() {

        $this->withoutMiddleware()->post(route('article.store'), [
            'body' => 'Hello',
            'user_id' => $this->user->id
        ])->assertStatus(302);
    }

    public function testDestory() {

        $post = Article::factory()->create();
        $url = '/article/' . strval($post->id);

        $this->withoutMiddleware()->delete($url)->assertStatus(200);
    }
}
