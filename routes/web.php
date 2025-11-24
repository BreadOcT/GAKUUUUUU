<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerMessageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TicketController;


// Admin login
Route::get('admin/login', [AuthController::class,'showAdminLoginForm'])->name('admin.login.form');
Route::post('admin/login', [AuthController::class,'adminLogin'])->name('admin.login.submit');
Route::post('admin/logout', [AuthController::class,'logout'])->name('admin.logout');

// Contact form (user)
Route::get('/contact', [CustomerMessageController::class, 'create'])->name('messages.create');
Route::post('/contact', [CustomerMessageController::class, 'store'])->name('messages.store');

// Admin routes (middleware admin)
Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');

    // Users CRUD
    Route::resource('users', UserController::class);

    // Messages CRUD untuk admin
    Route::get('messages', [CustomerMessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [CustomerMessageController::class, 'show'])->name('messages.show');
    Route::put('messages/{message}', [CustomerMessageController::class, 'update'])->name('messages.update');
    Route::delete('messages/{message}', [CustomerMessageController::class, 'destroy'])->name('messages.destroy');

    Route::get('/contact', function () {
    return view('messages.create'); // view di atas
})->middleware('auth')->name('messages.create');

Route::post('/messages', [CustomerMessageController::class, 'store'])
     ->middleware('auth')
     ->name('messages.store');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware Group untuk Siswa
Route::middleware(['auth', 'role:siswa'])->group(function () {
    
    Route::get('/', function () { return view('dashboard'); })->name('dashboard');

    // 1. FITUR PILIH TENTOR (CRUD)
    // Create (Pilih) & Read (Daftar Tentor & Pilihan Saya)
    Route::resource('bookings', BookingController::class);

    // 2. FITUR KONTAK CS (CRUD)
    // Create (Lapor), Read (Balasan), Update (Edit Pesan), Delete
    Route::resource('tickets', TicketController::class);
});

