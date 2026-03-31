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
        User::updateOrCreate(
            ['email' => 'admin@egbookkeeping.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        // Define Categories
        $categories = [
            ['name' => 'Development', 'slug' => 'development'],
            ['name' => 'Design', 'slug' => 'design'],
            ['name' => 'Marketing', 'slug' => 'marketing'],
            ['name' => 'Bookkeeping', 'slug' => 'bookkeeping'],
            ['name' => 'Tax', 'slug' => 'tax'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }

        // Define Posts
        $posts = [
            [
                'title' => '10 Web Development Trends in 2024',
                'slug' => 'web-development-trends-2024',
                'excerpt' => 'Discover the latest trends shaping the future of web development, from AI integration to advanced SSR techniques.',
                'body' => '<p>Web development is evolving faster than ever. In 2024, we are seeing a massive shift towards <strong>AI-integrated development workflows</strong> and the rise of <strong>Edge Computing</strong>.</p><h2>1. AI-Driven Development</h2><p>Artificial intelligence is no longer just a buzzword. It is now deeply integrated into IDEs and deployment pipelines, helping developers write cleaner code faster.</p><h2>2. Server-Side Rendering (SSR) Evolution</h2><p>Frameworks like Next.js and Remix are pushing the boundaries of what is possible with React, focusing on performance and SEO through advanced hydration strategies.</p><p>Stay tuned as we dive deeper into each of these trends in our upcoming articles.</p>',
                'is_published' => true,
                'category_id' => Category::where('slug', 'development')->first()->id,
                'featured_image' => null,
            ],
            [
                'title' => 'The Power of Good UX Design',
                'slug' => 'power-of-ux-design',
                'excerpt' => 'How user experience design can make or break your digital product and why it is the ultimate differentiator in 2024.',
                'body' => '<p>User experience (UX) is the heart of any successful digital product. In an era where users have infinite choices, <strong>simplicity and intuition</strong> are your greatest competitive advantages.</p><h2>Why UX Matters</h2><p>Good design is invisible. It guides the user seamlessly towards their goal without friction. Poor UX, on the other hand, causes frustration and leads to high bounce rates.</p><h2>Key Principles of 2024 UX</h2><ul><li>Accessibility by default</li><li>Micro-interactions for delight</li><li>Data-driven personalization</li></ul>',
                'is_published' => true,
                'category_id' => Category::where('slug', 'design')->first()->id,
                'featured_image' => null,
            ],
            [
                'title' => 'SEO Best Practices for 2024',
                'slug' => 'seo-best-practices-2024',
                'excerpt' => 'Essential strategies to improve your search engine rankings and dominate the SERPs in the age of AI search.',
                'body' => '<p>SEO is not dead; it is changing. With the introduction of Search Generative Experience (SGE), traditional keyword stuffing is even more obsolete.</p><h2>Focus on Authoritative Content</h2><p>Google prioritizes content that demonstrates **E-E-A-T**: Experience, Expertise, Authoritativeness, and Trustworthiness. Content should be written for humans first, then for search engines.</p><h2>Technical SEO</h2><p>Site speed, mobile responsiveness, and clean semantic HTML are the baseline requirements for ranking in 2024.</p>',
                'is_published' => true,
                'category_id' => Category::where('slug', 'marketing')->first()->id,
                'featured_image' => null,
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(['slug' => $post['slug']], $post);
        }
        
        // Seed some random Contact Submissions (Leads)
        ContactSubmission::factory(5)->create();
    }
}
