<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Main Pages
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/how-it-works', function () {
    return view('pages.how-it-works');
})->name('how-it-works');

Route::get('/industries', function () {
    return view('pages.industries');
})->name('industries');

Route::get('/benefits', function () {
    return view('pages.benefits');
})->name('benefits');

Route::get('/pricing', function () {
    return view('pages.pricing');
})->name('pricing');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Form Submissions
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Legal Pages
Route::prefix('legal')->name('legal.')->group(function () {
    Route::get('/privacy-policy', function () {
        return view('pages.legal.privacy');
    })->name('privacy');

    Route::get('/cookie-policy', function () {
        return view('pages.legal.cookies');
    })->name('cookies');

    Route::get('/terms-conditions', function () {
        return view('pages.legal.terms');
    })->name('terms');

    Route::get('/cancellation-refund', function () {
        return view('pages.legal.refund');
    })->name('refund');
});

// Sitemap
Route::get('/sitemap.xml', function () {
    $sitemap = \Spatie\Sitemap\Sitemap::create()
        ->add(\Spatie\Sitemap\Tags\Url::create('/')->setPriority(1.0))
        ->add(\Spatie\Sitemap\Tags\Url::create('/about')->setPriority(0.8))
        ->add(\Spatie\Sitemap\Tags\Url::create('/services')->setPriority(0.9))
        ->add(\Spatie\Sitemap\Tags\Url::create('/pricing')->setPriority(0.8))
        ->add(\Spatie\Sitemap\Tags\Url::create('/contact')->setPriority(0.8))
        ->add(\Spatie\Sitemap\Tags\Url::create('/blog')->setPriority(0.7));

    \App\Models\Post::where('is_published', true)->get()->each(function (\App\Models\Post $post) use ($sitemap) {
        $sitemap->add(
            \Spatie\Sitemap\Tags\Url::create("/blog/{$post->slug}")
                ->setLastModificationDate($post->updated_at)
                ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.6)
        );
    });

    return collect([$sitemap->render()])->first();
})->name('sitemap');
