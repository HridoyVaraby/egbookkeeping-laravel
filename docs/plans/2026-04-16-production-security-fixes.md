# Production Security Fixes Implementation Plan

> **For Claude:** REQUIRED SUB-SKILL: Use superpowers:executing-plans to implement this plan task-by-task.

**Goal:** Fix all critical and high-priority security vulnerabilities identified in production readiness audit to make the EG Bookkeeping Laravel application safe for production deployment.

**Architecture:** This plan addresses six critical security issues: (1) Environment configuration hardening, (2) Rate limiting on public forms, (3) Form Request class extraction, (4) XSS vulnerability in pricing notice content, (5) XSS vulnerability in page hero component, and (6) File upload security enhancements. Each fix follows Laravel security best practices with defense in depth.

**Tech Stack:** Laravel 11.x, PHP 8.3, Filament 3.x, mews/purifier, spatie/laravel-responsecache

---

## Task 1: Create Production Environment Configuration

**Files:**
- Create: `.env.production`
- Modify: `.env` (document changes)
- Create: `config/app.php` overrides if needed

**Step 1: Create production environment template**

Create `.env.production` file:

```bash
# Application
APP_NAME="EG Bookkeeping"
APP_ENV=production
APP_KEY=base64:J/CgAR+x0OwQE71EXfzzdvNF8odqdTYf2MGdHHtfUZE=
APP_DEBUG=false
APP_URL=https://egbookkeeping.com

# Logging
LOG_CHANNEL=stack
LOG_STACK=single
LOG_LEVEL=warning

# Database (update with production credentials)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=egbookkeeping_production
DB_USERNAME=egbookkeeping_user
DB_PASSWORD=CHANGE_THIS_SECURE_PASSWORD

# Session & Cache (use Redis for production)
SESSION_DRIVER=redis
SESSION_LIFETIME=120
SESSION_ENCRYPT=true
CACHE_STORE=redis
QUEUE_CONNECTION=redis

# Redis
REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# Mail (configure for production)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@egbookkeeping.com"
MAIL_FROM_NAME="${APP_NAME}"

# Security
FORCE_HTTPS=true
```

**Step 2: Update current .env for production readiness**

Update `.env` file (lines 2-5):

```bash
APP_ENV=production
APP_DEBUG=false
APP_URL=https://egbookkeeping.com
```

**Step 3: Add trusted proxy configuration**

Create `config/trustedproxy.php`:

```php
<?php

return [
    'proxies' => '*', // Or specific proxy IPs: ['192.168.1.1', '192.168.1.2']
    'headers' => Illuminate\Http\Request::HEADER_X_FORWARDED_ALL,
];
```

**Step 4: Update bootstrap/app.php for trusted proxies**

Add after line 20 in `bootstrap/app.php`:

```php
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(...)
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*'); // Or specific IPs
        $middleware->trustProxies(headers: Request::HEADER_X_FORWARDED_ALL);
        // ... existing middleware
    })
    ->withExceptions(...)
    ->create();
```

**Step 5: Clear and cache configuration**

Run:
```bash
php artisan config:clear
php artisan config:cache
```

Expected: "Configuration cached successfully."

**Step 6: Commit**

```bash
git add .env.production .env config/trustedproxy.php bootstrap/app.php
git commit -m "security: harden environment configuration for production"
```

---

## Task 2: Add Rate Limiting to Contact Form

**Files:**
- Modify: `routes/web.php`
- Create: `app/Http/Requests/StoreContactRequest.php`

**Step 1: Create throttle middleware configuration**

Add to `routes/web.php` after line 1 (before route definitions):

```php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
```

**Step 2: Add rate limiting to contact route**

Update `routes/web.php` line 46:

From:
```php
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
```

To:
```php
Route::middleware(['throttle:5,1'])->group(function () {
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});
```

This limits to 5 requests per minute per IP.

**Step 3: Create Form Request class**

Run:
```bash
php artisan make:request StoreContactRequest
```

Expected: "Request created successfully."

**Step 4: Implement Form Request validation**

Replace `app/Http/Requests/StoreContactRequest.php` content:

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Public form
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\'.-]+$/u'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20', 'regex:/^[0-9+\s\-\(\)]+$/'],
            'project_type' => ['nullable', 'string', 'max:255', 'in:Monthly Bookkeeping,Catch-Up Bookkeeping,Payroll Services,Tax Preparation,Business Consultation,Other'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.regex' => 'The name format is invalid.',
            'email.dns' => 'The email domain must be valid.',
            'phone.regex' => 'The phone number format is invalid.',
            'message.max' => 'The message must not exceed 5000 characters.',
        ];
    }
}
```

**Step 5: Update ContactController to use Form Request**

Update `app/Http/Controllers/ContactController.php`:

Add at line 5:
```php
use App\Http\Requests\StoreContactRequest;
```

Update `store` method (line 18):
```php
public function store(StoreContactRequest $request)
{
    $validated = $request->validated();

    ContactSubmission::create($validated);

    return back()
        ->with('success', 'Thank you for your message! We will get back to you soon.');
}
```

**Step 6: Test rate limiting**

Run:
```bash
php artisan route:list | grep contact
```

Expected: See throttle middleware listed.

**Step 7: Clear route cache**

Run:
```bash
php artisan route:clear
php artisan route:cache
```

Expected: "Routes cached successfully."

**Step 8: Commit**

```bash
git add routes/web.php app/Http/Requests/StoreContactRequest.php app/Http/Controllers/ContactController.php
git commit -m "security: add rate limiting and Form Request to contact form"
```

---

## Task 3: Fix XSS Vulnerability in Pricing Notice Content

**Files:**
- Modify: `resources/views/pages/pricing.blade.php`
- Modify: `app/Models/Setting.php`
- Create: `tests/Unit/SettingModelTest.php`

**Step 1: Add accessor to sanitize Setting value**

Update `app/Models/Setting.php`:

Replace content with:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Mews\Purifier\Facades\Purifier;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    /**
     * Sanitize value based on key type.
     */
    protected function value(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                // Allow HTML for pricing notice, sanitize it
                if ($this->key === 'pricing_notice_content') {
                    return Purifier::clean($value, 'youtube'); // Allows safe HTML
                }
                // For non-HTML settings, escape output
                return e($value);
            },
            set: fn ($value) => $value
        );
    }
}
```

**Step 2: Update pricing blade to use safe output**

Update `resources/views/pages/pricing.blade.php` line 199:

From:
```blade
{!! $pricingNoticeContent !!}
```

To:
```blade
{!! $pricingNoticeContent !!}  <!-- Sanitized via Setting model accessor -->
```

Add comment above line 193:
```blade
{{-- WARNING: pricing_notice_content is sanitized via Setting model accessor. Do not use {!! !!} elsewhere. --}}
```

**Step 3: Add configuration for purifier**

Create `config/purifier.php` if it doesn't exist:

Run:
```bash
php artisan vendor:publish --provider="Mews\Purifier\PurifierServiceProvider"
```

**Step 4: Write test for Setting sanitization**

Create `tests/Unit/SettingModelTest.php`:

```php
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
```

**Step 5: Run tests**

Run:
```bash
php artisan test tests/Unit/SettingModelTest.php
```

Expected: 2 tests passed.

**Step 6: Verify fix manually**

Run:
```bash
php artisan tinker --execute="
\$setting = new App\Models\Setting();
\$setting->key = 'pricing_notice_content';
\$setting->value = '<script>alert(1)</script><p>Safe</p>';
echo \$setting->value;
"
```

Expected: Output contains `<p>Safe</p>` but NOT `<script>`.

**Step 7: Commit**

```bash
git add app/Models/Setting.php resources/views/pages/pricing.blade.php tests/Unit/SettingModelTest.php config/purifier.php
git commit -m "security: sanitize pricing notice content to prevent XSS"
```

---

## Task 4: Fix XSS Vulnerability in Page Hero Component

**Files:**
- Modify: `resources/views/components/ui/page-hero.blade.php`
- Create: `tests/Blade/PageHeroComponentTest.php`

**Step 1: Add HTMLPurifier directive to AppServiceProvider**

Update `app/Providers/AppServiceProvider.php`:

Add at line 9:
```php
use Illuminate\Support\Facades\Blade;
use Mews\Purifier\Facades\Purifier;
```

Update `boot` method (line 20):
```php
public function boot(): void
{
    Blade::directive('sanitize', function ($expression) {
        return "<?php echo \Mews\Purifier\Facades\Purifier::clean($expression); ?>";
    });
}
```

**Step 2: Update page-hero component to sanitize title**

Update `resources/views/components/ui/page-hero.blade.php` line 20:

From:
```blade
<h1 class="text-4xl md:text-5xl font-bold text-eg-heading mb-4 font-display">
    {!! $title !!}
</h1>
```

To:
```blade
<h1 class="text-4xl md:text-5xl font-bold text-eg-heading mb-4 font-display">
    {!! Purifier::clean($title) !!}
</h1>
```

**Step 3: Add test for page-hero component**

Create `tests/Blade/PageHeroComponentTest.php`:

```php
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
```

**Step 4: Run tests**

Run:
```bash
php artisan test tests/Blade/PageHeroComponentTest.php
```

Expected: 1 test passed.

**Step 5: Verify all blade components using {!! are safe**

Run:
```bash
grep -r "{!!" /mnt/Personal/Work/Node-Projects/EGBookkeeping/egbookkeeping-laravel/resources/views --include="*.blade.php" | grep -v "csrf\|clean(" | grep -v "Sanitized via"
```

Expected: Only see comments explaining sanitization.

**Step 6: Commit**

```bash
git add app/Providers/AppServiceProvider.php resources/views/components/ui/page-hero.blade.php tests/Blade/PageHeroComponentTest.php
git commit -m "security: sanitize page-hero component title to prevent XSS"
```

---

## Task 5: Enhance File Upload Security for Featured Images

**Files:**
- Modify: `app/Filament/Resources/PostResource.php`
- Create: `config/filament.php` (if not exists)

**Step 1: Update FileUpload component with security options**

Update `app/Filament/Resources/PostResource.php` lines 86-88:

From:
```php
Forms\Components\FileUpload::make('featured_image')
    ->image()
    ->directory('blog'),
```

To:
```php
Forms\Components\FileUpload::make('featured_image')
    ->image()
    ->directory('blog')
    ->maxSize(5120) // 5MB max
    ->imageResizeTargetWidth(1920)
    ->imageResizeTargetHeight(1080)
    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
    ->enableFileNameRotation()
    ->preserveFilenames(false)
    ->downloadable()
    ->deletable(),
```

**Step 2: Add validation rule to Post model**

Update `app/Models/Post.php` line 16:

Add `'featured_image'` to fillable:
```php
protected $fillable = [
    'title', 'slug', 'body', 'excerpt', 'featured_image',
    'is_published', 'meta_title', 'meta_description', 'meta_keywords', 'category_id'
];
```

**Step 3: Create test for file upload validation**

Create `tests/Feature/PostFileUploadTest.php`:

```php
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
```

**Step 4: Run tests**

Run:
```bash
php artisan test tests/Feature/PostFileUploadTest.php
```

Expected: 3 tests passed.

**Step 5: Clear Filament cache**

Run:
```bash
php artisan filament:clear-cached-components
php artisan view:clear
```

Expected: Caches cleared.

**Step 6: Commit**

```bash
git add app/Filament/Resources/PostResource.php app/Models/Post.php tests/Feature/PostFileUploadTest.php
git commit -m "security: enhance file upload security for featured images"
```

---

## Task 6: Add CSRF and Security Headers

**Files:**
- Modify: `bootstrap/app.php`
- Create: `app/Http/Middleware/SetSecurityHeaders.php`

**Step 1: Create security headers middleware**

Run:
```bash
php artisan make:middleware SetSecurityHeaders
```

Expected: "Middleware created successfully."

**Step 2: Implement security headers**

Replace `app/Http/Middleware/SetSecurityHeaders.php` content:

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetSecurityHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Prevent clickjacking
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // Prevent MIME type sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Enable XSS filter
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // Referrer policy
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Content Security Policy (basic)
        $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.unpkg.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self' https://calendly.com;");

        return $response;
    }
}
```

**Step 3: Register security headers middleware**

Update `bootstrap/app.php` after line 16:

```php
->withMiddleware(function (Middleware $middleware): void {
    $middleware->web(append: [
        \Spatie\ResponseCache\Middlewares\CacheResponse::class,
        \App\Http\Middleware\SetSecurityHeaders::class,
    ]);
    // ... existing middleware
})
```

**Step 4: Test security headers**

Run:
```bash
curl -I http://localhost:8000 2>&1 | grep -E "X-Frame|X-Content|X-XSS|Content-Security"
```

Expected: See all security headers in response.

**Step 5: Commit**

```bash
git add bootstrap/app.php app/Http/Middleware/SetSecurityHeaders.php
git commit -m "security: add HTTP security headers"
```

---

## Task 7: Run Production Optimization Commands

**Files:**
- None (commands only)

**Step 1: Optimize composer autoloader**

Run:
```bash
composer install --optimize-autoloader --no-dev
```

Expected: "Generating optimized autoload files."

**Step 2: Clear all caches**

Run:
```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
php artisan filament:clear-cached-components
```

Expected: All caches cleared.

**Step 3: Re-cache for production**

Run:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

Expected: All caches created successfully.

**Step 4: Optimize application**

Run:
```bash
php artisan optimize
```

Expected: "Optimization cleared successfully. Caches optimized successfully."

**Step 5: Generate sitemap**

Run:
```bash
php artisan sitemap:generate
```

Expected: "Sitemap generated successfully."

**Step 6: Verify environment is production**

Run:
```bash
php artisan tinker --execute="echo app()->environment();"
```

Expected: "production"

**Step 7: Verify debug is off**

Run:
```bash
php artisan tinker --execute="var_dump(config('app.debug'));"
```

Expected: "bool(false)"

**Step 8: Run all tests**

Run:
```bash
php artisan test
```

Expected: All tests pass (at least 6 tests).

**Step 9: Commit**

```bash
git add bootstrap/cache config.php routes-v7.php services.json
git commit -m "build: run production optimization"
```

---

## Task 8: Pre-Deployment Verification Checklist

**Files:**
- None (verification steps)

**Step 1: Verify all critical issues are fixed**

Run:
```bash
php artisan tinker --execute="
\$env = app()->environment();
\$debug = config('app.debug');
echo 'Environment: ' . \$env . PHP_EOL;
echo 'Debug: ' . (\$debug ? 'ON (BAD!)' : 'OFF (GOOD)') . PHP_EOL;
"
```

Expected: "Environment: production" and "Debug: OFF (GOOD)"

**Step 2: Verify rate limiting is active**

Run:
```bash
php artisan route:list --json | grep contact | jq '.[].middleware'
```

Expected: See "throttle" in middleware list.

**Step 3: Verify Form Requests exist**

Run:
```bash
ls -la app/Http/Requests/StoreContactRequest.php
```

Expected: File exists.

**Step 4: Verify XSS sanitization is in place**

Run:
```bash
grep -n "Purifier::clean\|clean(" app/Models/Setting.php resources/views/components/ui/page-hero.blade.php | head -5
```

Expected: See sanitization code in both files.

**Step 5: Verify file upload constraints**

Run:
```bash
grep -A 10 "FileUpload.*featured_image" app/Filament/Resources/PostResource.php | grep -E "maxSize|acceptedFileTypes|imageResize"
```

Expected: See security constraints.

**Step 6: Verify security headers middleware**

Run:
```bash
ls -la app/Http/Middleware/SetSecurityHeaders.php
```

Expected: File exists.

**Step 7: Check all tests pass**

Run:
```bash
php artisan test --parallel
```

Expected: All tests pass.

**Step 8: Verify build assets**

Run:
```bash
ls -lh public/build/assets/
```

Expected: See app-*.js and app-*.css files.

**Step 9: Create deployment summary**

Create `DEPLOYMENT_CHECKLIST.md`:

```markdown
# Production Deployment Checklist

## Pre-Deployment
- [ ] Environment set to production
- [ ] Debug mode disabled
- [ ] Database credentials updated
- [ ] Redis configured (if using)
- [ ] SMTP mail configured
- [ ] SSL certificate installed
- [ ] Domain DNS configured

## Security
- [ ] Rate limiting on contact form
- [ ] Form Request classes created
- [ ] XSS vulnerabilities fixed
- [ ] File upload constraints added
- [ ] Security headers configured
- [ ] CSRF protection enabled

## Performance
- [ ] Config cached
- [ ] Routes cached
- [ ] Views cached
- [ ] Autoloader optimized
- [ ] Assets compiled
- [ ] Sitemap generated

## Post-Deployment
- [ ] Test contact form submission
- [ ] Test admin login
- [ ] Test blog post creation
- [ ] Verify SSL redirect
- [ ] Check security headers
- [ ] Monitor error logs
- [ ] Test backup system

## Verification Commands
```bash
# Check environment
php artisan tinker --execute="echo app()->environment();"

# Check debug mode
php artisan tinker --execute="var_dump(config('app.debug'));"

# Check rate limiting
php artisan route:list | grep contact

# Run tests
php artisan test

# Check cache status
php artisan config:cache && php artisan route:cache && php artisan view:cache
```
```

**Step 10: Final commit**

```bash
git add DEPLOYMENT_CHECKLIST.md
git commit -m "docs: add deployment checklist"
```

---

## Testing Strategy

### Unit Tests
- `SettingModelTest` - Verify XSS sanitization
- `PageHeroComponentTest` - Verify component sanitization

### Feature Tests
- `PostFileUploadTest` - Verify file upload security
- `ContactFormTest` - Verify rate limiting and validation

### Manual Testing Checklist
1. Test contact form with 6 rapid submissions (should block)
2. Create post with <script> in title (should sanitize)
3. Upload 6MB image (should reject)
4. Upload .exe file (should reject)
5. Verify security headers in browser dev tools

---

## Rollback Plan

If any issues arise:

```bash
# Rollback last commit
git revert HEAD

# Clear caches
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Restore previous state
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## Success Criteria

✅ All critical security vulnerabilities fixed
✅ All high-priority issues resolved
✅ All tests passing
✅ Application running in production mode
✅ Debug mode disabled
✅ Security headers in place
✅ Rate limiting active
✅ File uploads secured
✅ XSS vulnerabilities patched
✅ Ready for production deployment

---

**Estimated Time:** 4-6 hours
**Complexity:** Medium
**Risk Level:** Low (isolated changes with tests)
