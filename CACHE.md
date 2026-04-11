# Cache Troubleshooting

This project can appear "unstyled" even when the CSS build is correct.

## Typical Symptom

- The site loads at `http://localhost:8000`
- HTML renders, but Tailwind/Vite styles do not appear
- Navigation looks like plain links
- Layout appears broken or unformatted

## Root Cause Seen In This Project

The app uses Spatie response caching through global web middleware in [bootstrap/app.php](/mnt/Personal/Work/Node-Projects/EGBookkeeping/egbookkeeping-laravel/bootstrap/app.php:15).

When response caching is enabled in local development, Laravel can serve stale cached HTML that still points to old Vite asset hashes under `public/build/assets/...`.

Example failure mode:

1. CSS is built and HTML is cached.
2. Assets are rebuilt and file hashes change.
3. Cached HTML still references the old asset filename.
4. Browser loads the page without valid CSS, so the site looks unstyled.

## Current Fix In Repo

Response caching is now disabled by default outside production in [config/responsecache.php](/mnt/Personal/Work/Node-Projects/EGBookkeeping/egbookkeeping-laravel/config/responsecache.php:7):

```php
'enabled' => env('RESPONSE_CACHE_ENABLED', env('APP_ENV') === 'production'),
```

This means:

- `production`: cache enabled by default
- `local` or other non-production environments: cache disabled by default

## How To Verify CSS Is Actually Built

Check that these files exist:

- `public/build/manifest.json`
- `public/build/assets/*.css`
- `public/build/assets/*.js`

The layout loads assets through `@vite(...)` in:

- [resources/views/layouts/app.blade.php](/mnt/Personal/Work/Node-Projects/EGBookkeeping/egbookkeeping-laravel/resources/views/layouts/app.blade.php:22)
- [resources/views/components/layouts/app.blade.php](/mnt/Personal/Work/Node-Projects/EGBookkeeping/egbookkeeping-laravel/resources/views/components/layouts/app.blade.php:40)

## If The Problem Happens Again

Run these checks in order.

### 1. Confirm Laravel is not pointing to a Vite dev server

Check whether `public/hot` exists.

- If `public/hot` exists, Laravel will try to load assets from the Vite dev server.
- If you are not running `pnpm run dev`, the CSS/JS may fail to load.

Useful check:

```bash
ls -la public
cat public/hot
```

If `public/hot` exists by mistake, remove it or start the Vite dev server.

### 2. Confirm the production assets exist

```bash
find public/build -maxdepth 3 -type f | sort
sed -n '1,120p' public/build/manifest.json
```

If build files are missing, rebuild them:

```bash
pnpm install
pnpm run build
```

### 3. Clear the response cache

```bash
php artisan responsecache:clear
```

This is the most important command for the specific issue previously seen in this repo.

### 4. Hard refresh the browser

Even after server-side cache is fixed, the browser may still hold stale responses.

### 5. Confirm what `@vite` is emitting

If needed, render Vite tags directly from Laravel:

```bash
php -r 'require "vendor/autoload.php"; $app=require "bootstrap/app.php"; $app->make("Illuminate\\Contracts\\Console\\Kernel")->bootstrap(); echo app("Illuminate\\Foundation\\Vite")(["resources/css/app.css","resources/js/app.js"]);'
```

Expected result should reference current files under:

- `http://localhost:8000/build/assets/...` for built assets

Not:

- `http://localhost:5173/...` unless the Vite dev server is actually running

## Notes About `optimize:clear`

`php artisan optimize:clear` may fail in this project if the configured cache store requires database access and MySQL is unavailable.

That does not invalidate the response-cache fix.

If needed, you can still use:

```bash
php artisan responsecache:clear
```

as the targeted fix for the stale-HTML/CSS issue.

## Related Files

- [config/responsecache.php](/mnt/Personal/Work/Node-Projects/EGBookkeeping/egbookkeeping-laravel/config/responsecache.php:1)
- [bootstrap/app.php](/mnt/Personal/Work/Node-Projects/EGBookkeeping/egbookkeeping-laravel/bootstrap/app.php:1)
- [vite.config.js](/mnt/Personal/Work/Node-Projects/EGBookkeeping/egbookkeeping-laravel/vite.config.js:1)
- [resources/css/app.css](/mnt/Personal/Work/Node-Projects/EGBookkeeping/egbookkeeping-laravel/resources/css/app.css:1)
- [resources/views/components/layouts/app.blade.php](/mnt/Personal/Work/Node-Projects/EGBookkeeping/egbookkeeping-laravel/resources/views/components/layouts/app.blade.php:1)

## Short Version

If the site suddenly looks unstyled again:

1. Check `public/hot`
2. Check `public/build/manifest.json`
3. Run `php artisan responsecache:clear`
4. Hard refresh the browser
5. Rebuild assets with `pnpm run build` if needed
