<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FormSubmissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

// Redirect root to default locale
Route::get('/', function () {
    return view('globe');
});

// Localized routes
Route::prefix('{locale}')->where(['locale' => 'tr|en|ar'])->group(function () {
    // Home route
    Route::get('/', HomeController::class)->name('home');

    Route::view('/about', 'about')->name('about');

    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::resource('video', VideoController::class)->only(['index', 'show']);
    Route::resource('podcast', PodcastController::class)->only(['index', 'show']);
    Route::resource('contact', ContactController::class)->only(['index', 'store']);

    Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');


    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{slug}', [EventController::class, 'show'])->name('events.show');

    // Form routes
    Route::get('/form/{slug}', [FormSubmissionController::class, 'show'])->name('form.show');
    Route::post('/form/{slug}', [FormSubmissionController::class, 'submit'])->name('form.submit');

    // Feeds route
    Route::feeds();

    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

    // Search route
    Route::get('/search', [SearchController::class, 'index'])->name('search');

    // Dynamic page route by slug (must be after specific routes)
    Route::get('/page/{page}', [PageController::class, 'show'])->name('page.show');
});

// Language switching route (outside of locale group)
Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');
