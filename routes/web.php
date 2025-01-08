<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;     // Importowanie kontrolera
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ExcursionsController;
use App\Http\Controllers\DatesController;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DetailedInfoController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Payment2Controller;
use App\Http\Controllers\FinalController;

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
Route::get('/terms', [DatesController::class, 'index'])->name('terms');

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
Route::post('/contact', [EmailController::class, 'sendEmail'])->name('contact.send');

// Logowanie
Route::get('/dashboard', function () {
    return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Nowe routingi
Route::get('/trips', [TripsController::class, 'getAllTrips']);
Route::get('/dates/by-trip/{trip_id}', [DatesController::class, 'getDatesByTripId']);
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register'); // Dodanie trasy

// Trasy dla dostępności usług
Route::get('/service/available', function () {
    return view('service.available');
    })->middleware(['auth', 'verified'])->name('service.available');

Route::get('/service/unavailable', function () {
    return view('service.unavailable');
})->name('service.unavailable');

Route::get('/service/detailed_info', [DetailedInfoController::class, 'show'])->name('service.detailed_info');
Route::post('/service/detailed_info', [DetailedInfoController::class, 'store'])->name('client.store');

// Trasy dla płatności
Route::get('/service/payment', [PaymentController::class, 'show'])->name('service.payment');
Route::post('/service/payment/checkout', [PaymentController::class, 'checkout'])->name('service.payment.checkout');
Route::get('/service/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/service/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');
Route::get('/service/payment/failed', [PaymentController::class, 'paymentFailed'])->name('payment.failed');

Route::get('/service/payment2', [Payment2Controller::class, 'show'])->name('service.payment2');
Route::post('/service/payment2/checkout', [Payment2Controller::class, 'checkout'])->name('service.payment2.checkout');
Route::get('/service/payment2/success', [Payment2Controller::class, 'paymentSuccess'])->name('payment2.success');
Route::get('/service/payment2/cancel', [Payment2Controller::class, 'paymentCancel'])->name('payment2.cancel');
Route::get('/service/payment2/failed', [Payment2Controller::class, 'paymentFailed'])->name('payment2.failed');

Route::get('/service/final', [FinalController::class, 'show'])->name('service.final');
