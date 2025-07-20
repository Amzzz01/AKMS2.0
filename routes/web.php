<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AnakKariahController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Default route to welcome page
Route::get('/', function () {
    return view('welcome');
});

// Custom Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Home & Welcome
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');

// Redirect /dashboard to admin dashboard
Route::redirect('/dashboard', '/admin/dashboard');

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected by auth middleware)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Admin List
    Route::get('/list', [AdminController::class, 'index'])->name('admin.list');

    // Carousel Image Routes
    Route::get('/carousel-images', [CarouselController::class, 'index'])->name('admin.carousel.images');
    Route::post('/carousel/store', [CarouselController::class, 'store'])->name('admin.carousel.store');
    Route::delete('/carousel/{id}', [CarouselController::class, 'destroy'])->name('admin.delete.image');
});

/*
|--------------------------------------------------------------------------
| Anak Kariah Routes
|--------------------------------------------------------------------------
*/
Route::prefix('anak-kariah')->group(function () {
    Route::get('/create', [AnakKariahController::class, 'create'])->name('anak-kariah.create');
    Route::get('/list', [AnakKariahController::class, 'index'])->name('anak-kariah.list');
    Route::get('/{id}/edit', [AnakKariahController::class, 'edit'])->name('anak-kariah.edit');
    Route::put('/{id}', [AnakKariahController::class, 'update'])->name('anak-kariah.update');
    Route::delete('/{id}', [AnakKariahController::class, 'destroy'])->name('anak-kariah.destroy');
    Route::put('/{id}/toggle-status', [AnakKariahController::class, 'toggleStatus'])->name('anak-kariah.toggleStatus');
    Route::get('/export', [AnakKariahController::class, 'export'])->name('anak-kariah.export');
    Route::get('/search', [AnakKariahController::class, 'search'])->name('anak-kariah.search');
});

// Anak Kariah Registration Form and Submission
Route::get('/register-anak-kariah', [AnakKariahController::class, 'view'])->name('anak-kariah.view');
Route::post('/register-anak-kariah', [AnakKariahController::class, 'store'])->name('anak-kariah.store');

/*
|--------------------------------------------------------------------------
| Statistics
|--------------------------------------------------------------------------
*/
Route::get('/anak-kariah/statistics', [StatisticsController::class, 'index'])->name('anak-kariah.statistics');

/*
|--------------------------------------------------------------------------
| Donate Page Route
|--------------------------------------------------------------------------
*/
Route::get('/donate', function () {
    return view('donate');
})->name('donate');
