<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ContactSubmission;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@egbookkeeping.com',
            'password' => bcrypt('password'),
        ]);

        // Seed Categories & Posts
        Category::factory(5)->create()->each(function ($category) {
            Post::factory(rand(5, 10))->create([
                'category_id' => $category->id,
            ]);
        });
        
        // Seed Contact Submissions (Leads)
        ContactSubmission::factory(10)->create();
    }
}
