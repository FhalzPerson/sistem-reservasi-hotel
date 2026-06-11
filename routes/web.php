<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminUserController;


/*
|--------------------------------------------------------------------------
| Web Routes (tanpa auth)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('customer.home');
})->name('home');

Route::get('/kamar', [RoomController::class, 'indexRooms'])->name('rooms.index');
Route::get('/kamar/{id}', [RoomController::class, 'show'])->name('rooms.show');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Routes yang memerlukan autentikasi (login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // Booking & Payment
    Route::get('/booking/{id}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/payment/{id}', [BookingController::class, 'showPayment'])->name('payment.show');
    Route::post('/payment/{id}', [BookingController::class, 'processPayment'])->name('payment.process');
    Route::get('/booking/success/{id}', [BookingController::class, 'success'])->name('booking.success');

    // Riwayat & Profil
    Route::get('/riwayat', [BookingController::class, 'history'])->name('booking.history');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo');
});
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings');
    Route::get('/bookings/{id}', [AdminController::class, 'showBooking'])->name('bookings.show');
    Route::resource('rooms', AdminRoomController::class);
    Route::resource('users', AdminUserController::class);
});