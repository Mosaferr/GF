<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ExcursionsController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;



// Główna strona
Route::get('/', [HomeController::class, 'index'])->name('home');

// O nas
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Wyprawy
Route::get('/excursions', [ExcursionsController::class, 'index'])->name('excursions');
Route::get('/excursions/argentina', [ExcursionsController::class, 'argentina'])->name('excursions.argentina');
Route::get('/excursions/indonesia', [ExcursionsController::class, 'indonesia'])->name('excursions.indonesia');
Route::get('/excursions/cambodia', [ExcursionsController::class, 'cambodia'])->name('excursions.cambodia');
Route::get('/excursions/peru', [ExcursionsController::class, 'peru'])->name('excursions.peru');
Route::get('/excursions/sri_lanka', [ExcursionsController::class, 'sri_lanka'])->name('excursions.sri_lanka');
Route::get('/excursions/tibet', [ExcursionsController::class, 'tibet'])->name('excursions.tibet');

// Terminy
Route::get('/terms', [TermsController::class, 'index'])->name('terms');

// Galeria
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/argentina', [GalleryController::class, 'argentina'])->name('gallery.argentina');
Route::get('/gallery/bolivia', [GalleryController::class, 'bolivia'])->name('gallery.bolivia');
Route::get('/gallery/chile', [GalleryController::class, 'chile'])->name('gallery.chile');
Route::get('/gallery/china', [GalleryController::class, 'china'])->name('gallery.china');
Route::get('/gallery/indonesia', [GalleryController::class, 'indonesia'])->name('gallery.indonesia');
Route::get('/gallery/cambodia', [GalleryController::class, 'cambodia'])->name('gallery.cambodia');
Route::get('/gallery/peru', [GalleryController::class, 'peru'])->name('gallery.peru');
Route::get('/gallery/sri_lanka', [GalleryController::class, 'sri_lanka'])->name('gallery.sri_lanka');
Route::get('/gallery/tibet', [GalleryController::class, 'tibet'])->name('gallery.tibet');

// Informacje
Route::get('/information', [InformationController::class, 'index'])->name('information');

// Kontakt
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Logowanie
// Route::get('/forms/login', [LoginController::class, 'login'])->name('forms.login');
Route::get('/login', [LoginController::class, 'index'])->name('login');
