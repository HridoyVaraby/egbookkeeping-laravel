<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraphs(5, true),
            'excerpt' => $this->faker->sentence(),
            'featured_image' => 'https://picsum.photos/seed/' . $this->faker->word . '/1200/800',
            'is_published' => $this->faker->boolean(80),
            'meta_title' => $this->faker->sentence(),
            'meta_description' => $this->faker->sentence(),
            'category_id' => Category::factory(),
        ];
    }
}
