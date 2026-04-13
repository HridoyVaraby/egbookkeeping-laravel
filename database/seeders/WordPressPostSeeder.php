<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class WordPressPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inputPostsDir = base_path('Blog-Posts-From-Wordpress/output/posts');
        $inputImagesDir = base_path('Blog-Posts-From-Wordpress/output/images');
        $outputImagesDir = storage_path('app/public/blog/images');

        // Ensure output images directory exists
        if (!File::exists($outputImagesDir)) {
            File::makeDirectory($outputImagesDir, 0755, true);
        }

        // Copy all images
        if (File::exists($inputImagesDir)) {
            File::copyDirectory($inputImagesDir, $outputImagesDir);
        }

        // Parse and seed posts
        if (!File::exists($inputPostsDir)) {
            $this->command->error("Posts directory not found: {$inputPostsDir}");
            return;
        }

        $files = File::files($inputPostsDir);

        foreach ($files as $file) {
            if ($file->getExtension() !== 'md') {
                continue;
            }

            $content = File::get($file->getPathname());

            // Extract frontmatter and body
            if (preg_match('/^---\s*(.*?)\s*---\s*(.*)/s', $content, $matches)) {
                $frontmatter = $matches[1];
                $markdownBody = trim($matches[2]);

                $title = $this->extractField($frontmatter, 'title');
                $date = $this->extractField($frontmatter, 'date');
                $coverImage = $this->extractField($frontmatter, 'coverImage');
                $categories = $this->extractCategories($frontmatter);

                if (!$title) {
                    continue; // Skip if no title
                }

                // Process first category or default
                $categoryName = $categories[0] ?? 'Uncategorized';
                $category = Category::firstOrCreate([
                    'slug' => Str::slug($categoryName)
                ], [
                    'name' => Str::title(str_replace('-', ' ', $categoryName))
                ]);

                $featuredImagePath = null;
                if ($coverImage) {
                    $featuredImagePath = 'blog/images/' . $coverImage;
                }
                
                // Convert Markdown body to HTML since Laravel pages expect HTML
                $htmlBody = Str::markdown($markdownBody);

                $post = Post::updateOrCreate(
                    ['slug' => Str::slug($title)],
                    [
                        'title' => trim($title, '"\''),
                        'body' => $htmlBody,
                        'excerpt' => Str::limit(strip_tags($htmlBody), 150),
                        'featured_image' => $featuredImagePath,
                        'is_published' => true,
                        'category_id' => $category->id,
                        'created_at' => $date ? date('Y-m-d H:i:s', strtotime($date)) : now(),
                        'updated_at' => $date ? date('Y-m-d H:i:s', strtotime($date)) : now(),
                    ]
                );

                $this->command->info("Seeded: {$post->title}");
            }
        }
    }

    private function extractField($frontmatter, $field)
    {
        if (preg_match('/^' . preg_quote($field, '/') . ':\s*(.*)$/m', $frontmatter, $matches)) {
            return trim($matches[1], ' "\'');
        }
        return null;
    }

    private function extractCategories($frontmatter)
    {
        $categories = [];
        if (preg_match('/^categories:\s*\n((?:\s*-\s*".*?"\s*\n)+)/m', $frontmatter, $matches)) {
            preg_match_all('/^\s*-\s*"(.*?)"/m', $matches[1], $catMatches);
            if (!empty($catMatches[1])) {
                $categories = $catMatches[1];
            }
        }
        return $categories;
    }
}
