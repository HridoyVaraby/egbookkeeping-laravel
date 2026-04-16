# Project Overview

EG Bookkeeping is a full-stack web application built using the Laravel PHP framework. It serves as a modern, high-performance platform featuring a public-facing website and an administrative dashboard. The application is designed to be elegant, secure, and easy to maintain.

**Main Technologies & Architecture:**
- **Backend:** PHP 8.3, Laravel 11.x
- **Frontend:** Blade Templates, Tailwind CSS, Alpine.js, compiled via Vite
- **Admin Panel:** Filament (v3.2)
- **Database:** MySQL/SQLite (via Eloquent ORM)
- **Security & SEO:** `mews/purifier` for XSS protection, `spatie/laravel-responsecache` for performance, and `spatie/laravel-sitemap` for SEO.

---

## Building and Running

The project uses Composer and NPM for dependency management and scripts.

### Setup

To set up the project initially, you can use the predefined Composer script or run the commands manually:

```bash
# Automated setup (installs dependencies, sets up .env, generates key, runs migrations, and builds assets)
composer setup
```

**Manual Setup Steps:**
1. Install PHP dependencies: `composer install`
2. Install Node dependencies: `npm install`
3. Configure environment: `cp .env.example .env` then `php artisan key:generate`
4. Run migrations: `php artisan migrate`
5. Build frontend assets: `npm run build`

### Development Server

The easiest way to start the local development environment is using the predefined `dev` script, which concurrently runs the PHP server, Vite development server, queue listener, and log tailing.

```bash
composer dev
```

Alternatively, you can run them in separate terminal tabs:
```bash
php artisan serve
npm run dev
php artisan queue:listen
```

### Testing

The application uses PHPUnit for testing. You can run the test suite using:

```bash
composer test
# OR
php artisan test
```

---

## Development Conventions

- **Architecture:** Follows standard MVC (Model-View-Controller) architecture utilizing the default Laravel directory structure (`app/`, `config/`, `database/`, `routes/`, `resources/`, etc.).
- **Styling:** Tailwind CSS is used extensively within Blade templates (`resources/views/`). Avoid writing custom CSS unless absolutely necessary.
- **Interactivity:** Alpine.js is preferred for lightweight frontend interactivity to keep the JavaScript footprint small.
- **Admin Interface:** The admin dashboard is managed entirely through Filament (`app/Filament/`). New CRUD operations and admin pages should be created using Filament resources and widgets.
- **Security:** Always use `mews/purifier` (`Purifier::clean()`) when rendering rich text or user-provided HTML content to prevent XSS. Use Laravel's built-in validation or Form Requests for handling user input.
- **Routing:** All web routes are defined in `routes/web.php`. Utilize route grouping, naming conventions, and middleware (e.g., `throttle` for form submissions) to keep routes organized and secure.
