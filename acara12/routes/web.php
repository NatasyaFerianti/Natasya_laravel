<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Middleware\CheckAge;
use App\Http\Controllers\DemoController;
use App\Http\Middleware\BeforeMiddleware;
use App\Http\Middleware\AfterMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// Menggunakan BeforeMiddleware pada route dashboard
Route::get('/dashboard', function () {
    Log::info('User accessed dashboard');
    return "Halaman dashboard dengan BeforeMiddleware";
})->middleware(BeforeMiddleware::class);

// Menggunakan BeforeMiddleware dan AfterMiddleware pada grup route
Route::middleware([BeforeMiddleware::class, AfterMiddleware::class])->group(function () {
    Route::get('/admin', function () { 
        Log::info('User accessed admin page');
        return "Halaman admin dengan BeforeMiddleware dan AfterMiddleware";
    });

    Route::get('/settings', function () { 
        Log::info('User accessed settings page');
        return "Halaman settings dengan BeforeMiddleware dan AfterMiddleware";
    });
});

// Menerapkan CheckAge middleware pada route tertentu
Route::get('/check-age', function () {
    Log::info('User checked age');
    return "Anda berhasil mengakses halaman ini, usia Anda lebih dari 200";
})->middleware(CheckAge::class);

// Menggunakan route resource dengan controller yang sudah memiliki middleware
Route::get('/demo', [DemoController::class, 'index'])->name('demo.index');
Route::get('/demo/{id}', [DemoController::class, 'show'])->name('demo.show');
Route::get('/demo/{id}/edit', [DemoController::class, 'edit'])->name('demo.edit');
Route::post('/demo', [DemoController::class, 'store'])->name('demo.store');

// Opsional: Tambahkan route untuk menguji middleware dengan parameter
Route::get('/admin/editor', function () {
    Log::info('User accessed editor page');
    return "Anda adalah editor!";
})->middleware('role:editor');

// Opsional: Tambahkan route untuk menguji middleware grup
Route::middleware('web')->group(function () {
    Route::get('/web-route', function () {
        Log::info('User accessed web route');
        return "Route dengan middleware grup 'web'";
    });
});
