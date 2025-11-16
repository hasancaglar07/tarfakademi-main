<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\FormController;
use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\PodcastController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\VideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    // Home endpoint
    Route::get('/home', [HomeController::class, 'index']);

    // Blog endpoints
    Route::get('/posts', [BlogController::class, 'index']);
    Route::get('/posts/{locale}/{slug}', [BlogController::class, 'show'])->where('locale', 'tr|en|ar');

    // Categories
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{locale}/{slug}', [CategoryController::class, 'show'])->where('locale', 'tr|en|ar');

    // Videos
    Route::get('/videos', [VideoController::class, 'index']);
    Route::get('/videos/{locale}/{slug}', [VideoController::class, 'show'])->where('locale', 'tr|en|ar');

    // Podcasts
    Route::get('/podcasts', [PodcastController::class, 'index']);
    Route::get('/podcasts/{locale}/{slug}', [PodcastController::class, 'show'])->where('locale', 'tr|en|ar');

    // Events
    Route::get('/events', [EventController::class, 'index']);
    Route::get('/events/{locale}/{slug}', [EventController::class, 'show'])->where('locale', 'tr|en|ar');

    // Services
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/services/{locale}/{slug}', [ServiceController::class, 'show'])->where('locale', 'tr|en|ar');

    // FAQs
    Route::get('/faqs', [FaqController::class, 'index']);

    // Heroes (Slider)
    Route::get('/heroes', [HeroController::class, 'index']);

    // Forms
    Route::get('/forms/{slug}', [FormController::class, 'show']);
    Route::post('/forms/{slug}/submit', [FormController::class, 'submit']);

    // Search
    Route::get('/search', [SearchController::class, 'index']);

    // Settings
    Route::get('/settings', [SettingsController::class, 'index']);
});