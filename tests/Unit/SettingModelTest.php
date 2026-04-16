<?php

namespace Tests\Unit;

use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_pricing_notice_content_is_sanitized(): void
    {
        $setting = Setting::create([
            'key' => 'pricing_notice_content',
            'value' => '<script>alert("xss")</script><p>Safe content</p>'
        ]);

        $this->assertStringNotContainsString('<script>', $setting->value);
        $this->assertStringContainsString('<p>Safe content</p>', $setting->value);
    }

    public function test_non_html_settings_are_escaped(): void
    {
        $setting = Setting::create([
            'key' => 'site_name',
            'value' => '<script>alert("xss")</script>My Site'
        ]);

        $this->assertStringNotContainsString('<script>', $setting->value);
        $this->assertStringContainsString('&lt;script&gt;', $setting->value);
    }
}
