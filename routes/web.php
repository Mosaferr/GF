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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientListController;
use App\Http\Controllers\ClientDataController;
use App\Http\Controllers\AddDataController;
use App\Http\Controllers\TripListController;
use App\Http\Middleware\Manager;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Normal;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TripDataController;

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
})->middleware(['auth', 'verified', Normal::class])->name('dashboard');
Route::get('/admin/manager', function () {
    return view('admin.manager');
})->middleware(['auth', 'verified', Manager::class])->name('manager');
Route::get('/admin/admin', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified', Admin::class])
    ->name('admin');

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

// Service          -Trasy dla dostępności usług (Serwis usera)
Route::get('/service/available', function () {
    return view('service.available');
    })->middleware(['auth', 'verified'])->name('service.available');

Route::get('/service/unavailable', function () {
    return view('service.unavailable');
    })->name('service.unavailable');

Route::middleware(['auth'])->group(function () {
    Route::get('/service/detailed_info', [DetailedInfoController::class, 'show'])->name('service.detailed_info');
    Route::post('/service/detailed_info', [DetailedInfoController::class, 'store'])->name('client.store');

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
});

// Admin
Route::middleware(['auth', Admin::class])->group(function () {
    // Route::get('/admin/admin', [AdminController::class, 'index'])->name('admin.admin');
    Route::get('/admin/clientlist', [ClientListController::class, 'index'])->name('admin.clientlist');          // Wyświetlenie listy i redirect po usunięciu klienta
    Route::get('/admin/clientdata/edit/{id}', [ClientDataController::class, 'edit'])->name('admin.clientdata.edit');
    Route::get('/admin/clientdata/show/{id}', [ClientDataController::class, 'show'])->name('admin.clientdata.show');

    // Trasy z clientdata
    Route::get('/ ', [ClientDataController::class, 'index'])->name('admin.clientdata.index');                   // Powrót do listy --?-- SPR CO TO
    Route::put('/admin/clientdata/{id}', [ClientDataController::class, 'update'])->name('admin.clientdata.update');     // Aktualizacja
    Route::delete('/admin/clientdata/{id}', [ClientDataController::class, 'destroy'])->name('admin.clientdata.destroy');
    // Route::get('/admin/clientlist', [ClientListController::class, 'index'])->name('admin.clientlist');                           // Usunięcie klienta

    // Nowy klient
    Route::get('/admin/adddata', [AddDataController::class, 'create'])->name('admin.adddata.create');           // Wyświetlenie formularza rejestracji klienta
    Route::post('/admin/adddata/store', [AddDataController::class, 'store'])->name('admin.adddata.store');      // Zapisanie nowego klienta

    // Lista tras
    Route::get('/admin/triplist', [TripListController::class, 'index'])->name('admin.triplist');                // Wyświetlenie listy wycieczek
    Route::get('/group/{trip_id}', [GroupController::class, 'showGroup'])->name('group.show');                  // Wyświetlenie grupy

    Route::get('/ ', [TripDataController::class, 'index'])->name('admin.tripdata.index');                   // Powrót do listy --?-- SPR CO TO

    Route::get('admin/tripdata/{tripId}/{dateId}', [TripDataController::class, 'edit'])->name('admin.tripdata.edit');
    Route::put('/admin/tripdata/{tripId}/{dateId}', [TripDataController::class, 'update'])->name('admin.tripdata.update');
    Route::delete('/admin/tripdata/{id}', [TripDataController::class, 'destroy'])->name('admin.tripdata.destroy');
});

