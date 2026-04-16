<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     */
    protected $description = 'Generate the sitemap.xml file with all static and dynamic routes';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Generating sitemap...');

        $sitemap = Sitemap::create();

        // Static pages
        $staticRoutes = [
            ['url' => '/', 'priority' => 1.0, 'frequency' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/about', 'priority' => 0.8, 'frequency' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/services', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/how-it-works', 'priority' => 0.7, 'frequency' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/industries', 'priority' => 0.7, 'frequency' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/benefits', 'priority' => 0.7, 'frequency' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/pricing', 'priority' => 0.8, 'frequency' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/contact', 'priority' => 0.8, 'frequency' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/blog', 'priority' => 0.8, 'frequency' => Url::CHANGE_FREQUENCY_DAILY],
            // Legal pages
            ['url' => '/legal/privacy-policy', 'priority' => 0.3, 'frequency' => Url::CHANGE_FREQUENCY_YEARLY],
            ['url' => '/legal/cookie-policy', 'priority' => 0.3, 'frequency' => Url::CHANGE_FREQUENCY_YEARLY],
            ['url' => '/legal/terms-conditions', 'priority' => 0.3, 'frequency' => Url::CHANGE_FREQUENCY_YEARLY],
            ['url' => '/legal/cancellation-refund', 'priority' => 0.3, 'frequency' => Url::CHANGE_FREQUENCY_YEARLY],
        ];

        foreach ($staticRoutes as $route) {
            $sitemap->add(
                Url::create($route['url'])
                    ->setPriority($route['priority'])
                    ->setChangeFrequency($route['frequency'])
            );
        }

        // Dynamic blog posts
        Post::where('is_published', true)->get()->each(function (Post $post) use ($sitemap) {
            $sitemap->add(
                Url::create("/blog/{$post->slug}")
                    ->setLastModificationDate($post->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.6)
            );
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully at public/sitemap.xml');

        return self::SUCCESS;
    }
}
