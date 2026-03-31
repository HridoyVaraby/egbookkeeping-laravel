<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Static Pages (Placeholders for now) - Will be implemented in Phase 3
Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/portfolio', function () {
    return view('pages.portfolio');
})->name('portfolio');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/pricing', function () {
    return view('pages.pricing');
})->name('pricing');

// Blog Routes (Phase 3 & 4)
Route::get('/blog', function () {
    return view('pages.blog.index');
})->name('blog.index');

Route::get('/blog/{slug}', function ($slug) {
    return view('pages.blog.show', ['slug' => $slug]);
})->name('blog.show');
