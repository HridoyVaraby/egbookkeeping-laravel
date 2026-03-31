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

    Route::get('/terms-conditions', function () {
        return view('pages.legal.terms');
    })->name('terms');

    Route::get('/cancellation-refund', function () {
        return view('pages.legal.refund');
    })->name('refund');
});
