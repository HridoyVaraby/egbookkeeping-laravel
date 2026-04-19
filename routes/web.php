<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TaxPreparerController;

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

Route::get('/portfolio', function () {
    return view('pages.portfolio');
})->name('portfolio');

Route::get('/pricing', function () {
    return view('pages.pricing');
})->name('pricing');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

// Tax Preparer Landing Page
Route::get('/taxpreparer', [TaxPreparerController::class, 'index'])->name('taxpreparer.index');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Form Submissions
Route::middleware(['throttle:5,1'])->group(function () {
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});

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
    $path = public_path('sitemap.xml');

    if (!file_exists($path)) {
        \Illuminate\Support\Facades\Artisan::call('sitemap:generate');
    }

    return response()->file($path, [
        'Content-Type' => 'application/xml',
    ]);
})->name('sitemap');

