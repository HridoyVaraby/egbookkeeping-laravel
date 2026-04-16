<?php

namespace Tests\Blade;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageHeroComponentTest extends TestCase
{
    public function test_page_hero_sanitizes_xss_in_title(): void
    {
        $maliciousTitle = '<script>alert("xss")</script><h1>Safe Title</h1>';
        $output = (string) $this->blade('<x-ui.page-hero :title="$title" />', ['title' => $maliciousTitle]);

        $this->assertStringNotContainsString('<script>', $output);
        $this->assertStringContainsString('Safe Title', $output);
    }
}
