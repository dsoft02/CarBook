<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CarModelController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\SeatTypeController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CarListingController;
use App\Http\Controllers\BookingController;

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

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('profile/update', [AdminController::class, 'updateProfile'])->name('profile.update');
    Route::put('profile/password', [AdminController::class, 'updatePassword'])->name('profile.password');

    // Brand routes
    Route::get('brands', [BrandController::class, 'index'])->name('brands.index');
    Route::post('brands', [BrandController::class, 'store'])->name('brands.store');
    Route::put('brands/{id}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');

    // Model routes
    Route::get('models', [CarModelController::class, 'index'])->name('models.index');
    Route::post('models', [CarModelController::class, 'store'])->name('models.store');
    Route::put('models/update/{id}', [CarModelController::class, 'update'])->name('models.update');
    Route::delete('models/delete/{id}', [CarModelController::class, 'destroy'])->name('models.destroy');

    // Car routes
    Route::get('cars', [CarController::class, 'index'])->name('cars.index');
    Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('cars', [CarController::class, 'store'])->name('cars.store');
    Route::get('cars/edit/{id}', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('cars/update/{id}', [CarController::class, 'update'])->name('cars.update');
    Route::delete('cars/delete/{id}', [CarController::class, 'destroy'])->name('cars.destroy');
    Route::get('cars/get-models/{brandId}', [CarController::class, 'getModels'])->name('cars.getModels');

    // Feature routes
    Route::get('features', [FeatureController::class, 'index'])->name('features.index');
    Route::post('features', [FeatureController::class, 'store'])->name('features.store');
    Route::put('features/update/{id}', [FeatureController::class, 'update'])->name('features.update');
    Route::delete('features/delete/{id}', [FeatureController::class, 'destroy'])->name('features.destroy');

    // Seat Type routes
    Route::get('seat-types', [SeatTypeController::class, 'index'])->name('seat-types.index');
    Route::post('seat-types', [SeatTypeController::class, 'store'])->name('seat-types.store');
    Route::put('seat-types/update/{id}', [SeatTypeController::class, 'update'])->name('seat-types.update');
    Route::delete('seat-types/delete/{id}', [SeatTypeController::class, 'destroy'])->name('seat-types.destroy');

    // Review routes
    Route::get('reviews', [RatingController::class, 'index'])->name('reviews.index');
    Route::delete('reviews/delete/{id}', [RatingController::class, 'destroy'])->name('reviews.destroy');

    //Bookings routes
    Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('bookings/upcoming', [BookingController::class, 'upcoming'])->name('bookings.upcoming');
    Route::get('bookings/completed', [BookingController::class, 'completed'])->name('bookings.completed');
    Route::get('bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::post('bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
    Route::post('bookings/{id}/complete', [BookingController::class, 'complete'])->name('bookings.complete');

});

// User routes (customers)
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/booking/{car}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

});

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::post('/contact', [SiteController::class, 'storeContact'])->name('contact.store');
Route::get('/cars', [CarListingController::class, 'index'])->name('cars.index');
Route::get('/cars/{id}', [CarListingController::class, 'show'])->name('cars.show');
Route::post('/cars/{car}/ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::get('/check-car-availability', [CarListingController::class, 'checkAvailability']);


require __DIR__.'/auth.php';
