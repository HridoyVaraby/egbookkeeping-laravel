<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostFileUploadTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
        $this->actingAs(User::factory()->create());
    }

    public function test_featured_image_upload_accepts_valid_types(): void
    {
        $file = UploadedFile::fake()->image('photo.jpg', 1920, 1080);

        $response = $this->post('/admin/posts', [
            'title' => 'Test Post',
            'slug' => 'test-post',
            'body' => 'Content',
            'category_id' => 1,
            'featured_image' => $file,
        ]);

        $this->assertDatabaseHas('posts', [
            'featured_image' => 'blog/' . $file->hashName(),
        ]);
    }

    public function test_featured_image_upload_rejects_large_files(): void
    {
        $file = UploadedFile::fake()
            ->image('huge.jpg', 3000, 3000)
            ->size(6000); // 6MB

        $response = $this->post('/admin/posts', [
            'title' => 'Test Post',
            'slug' => 'test-post',
            'body' => 'Content',
            'category_id' => 1,
            'featured_image' => $file,
        ]);

        $response->assertSessionHasErrors('featured_image');
    }

    public function test_featured_image_upload_rejects_invalid_types(): void
    {
        $file = UploadedFile::fake()
            ->create('malicious.exe', 1000);

        $response = $this->post('/admin/posts', [
            'title' => 'Test Post',
            'slug' => 'test-post',
            'body' => 'Content',
            'category_id' => 1,
            'featured_image' => $file,
        ]);

        $response->assertSessionHasErrors('featured_image');
    }
}
