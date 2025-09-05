<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Global Search
Route::get('/search', [SearchController::class, 'index'])->name('search');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Guest only routes (tidak bisa diakses jika sudah login)
Route::middleware(['guest'])->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    // Register
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

// Authenticated routes (perlu login)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    
    // Booking (perlu login)
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('bookings.my');
});

/*
|--------------------------------------------------------------------------
| Public Routes (tidak perlu login)
|--------------------------------------------------------------------------
*/

// Tickets
Route::prefix('tickets')->name('tickets.')->group(function () {
    Route::get('/', [TicketController::class, 'index'])->name('index');
    Route::get('/{id}', [HotelController::class, 'show'])->name('show');
});

// Hotels
Route::prefix('hotels')->name('hotels.')->group(function () {
    Route::get('/', [HotelController::class, 'index'])->name('index');
    Route::get('/{id}', [HotelController::class, 'show'])->name('show');
});

// Restaurants
Route::prefix('restaurants')->name('restaurants.')->group(function () {
    Route::get('/', [RestaurantController::class, 'index'])->name('index');
    Route::get('/{id}', [RestaurantController::class, 'show'])->name('show');
});

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Booking Info (halaman info booking, tidak perlu login)
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');

/*
|--------------------------------------------------------------------------
| API Routes (jika perlu untuk AJAX)
|--------------------------------------------------------------------------
*/

Route::prefix('api')->name('api.')->group(function () {
    // Search suggestions
    Route::get('/search/suggestions', [SearchController::class, 'suggestions'])->name('search.suggestions');
    
    // Get hotel availability
    Route::post('/hotels/{id}/availability', [HotelController::class, 'checkAvailability'])->name('hotels.availability');
    
    // Get attraction pricing
    Route::get('/attractions/{id}/pricing', [AttractionController::class, 'pricing'])->name('attractions.pricing');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (jika perlu admin panel)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', function () { return view('admin.dashboard'); })->name('dashboard');
    
    // Manage content
    Route::resource('hotels', 'Admin\HotelController');
    Route::resource('restaurants', 'Admin\RestaurantController');
    Route::resource('attractions', 'Admin\AttractionController');
    Route::resource('bookings', 'Admin\BookingController');
});

/*
|--------------------------------------------------------------------------
| Error Pages
|--------------------------------------------------------------------------
*/

// Custom error pages
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});