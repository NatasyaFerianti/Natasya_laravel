<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementUserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\backend\PendidikanController;
use App\Http\Controllers\backend\PengalamanKerjaController;
use App\Http\Middleware\CheckAge;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CobaController;


Route::get('/', function () {
    return view('welcome');
});

//Acara 3

Route::get('foo', function () {
    return 'Hellow World';
});

Route::get('user/{id}', function ($id) {
    return 'User ' . $id;
});

Route::get('post/{post}/comments/{comment}', function ($postID, $commentID) {});

//Method Route
//Route::get($uri, $callback);
//Route::post($uri, $callback);
//Route::put($uri, $callback);
//Route::patch($uri, $callback);
//Route::delete($uri, $callback);
//Route::options($uri, $callback);

Route::match(['get', 'post'], '/match', fn() => 'hello');

Route::get('search/{search}', fn($search) => $search)->where('search', '.*');

//Acara 4
Route::get('user/{id}/profile', function ($id) {
    return 'Hello ' . $id;
})->name('profile')->middleware('check.profile');

Route::get('user/{id}/profiles', function ($id) {})->name('profiles');

//Route bersama
Route::get('test-url', function () {
    return route('profiles', ['id' => 1, 'photos' => 'yes']);
});

//middleware
Route::middleware(['first', 'second'])->group(function () {
    Route::get('product', function () {});

    Route::get('member', function () {});
});

//namespace
Route::namespace('Admin')->group(function () {});

//domain routing
Route::domain('{account}.myapp.com')->group(function () {
    Route::get('users/{id}', fn($account, $id) => '')->name('users');
});

//Acara 5
Route::get('/user', [ManagementUserController::class, 'index']);
Route::get('/user/create', [ManagementUserController::class, 'create']);
Route::post('/user', [ManagementUserController::class, 'store']);
Route::get('/user/{id}', [ManagementUserController::class, 'show']);
Route::get('/user/{id}/edit', [ManagementUserController::class, 'edit']);
Route::put('/user/{id}', [ManagementUserController::class, 'update']);
Route::delete('/user/{id}', [ManagementUserController::class, 'destroy']);

//Acara 6
Route::get('beranda', [ManagementUserController::class, 'index']);

//Acara 7
Route::group(['namespace' => 'App\Http\Controllers\frontend'], function () {
    Route::resource('homes', 'HomeController');
});

//Acara 8 dan acara 13-16
Route::group(['namespace' => 'App\Http\Controllers\backend'], function () {
    Route::resource('dashboard', 'DashboardController');
    Route::resource('pendidikan', 'PendidikanController');
    Route::resource('pengalaman_kerja', 'PengalamanKerjaController');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Acara 12
Route::get('admin/profile', function () {
    //
})->middleware('auth');

Route::get('/', function () {
    //
})->middleware('first', 'second');

Route::get('admin/profile', function () {
    //
})->middleware(CheckAge::class);

Route::get('/', function () {
    //
})->middleware('web');

Route::group(['middleware' => ['web']], function () {});

Route::middleware(['web', 'subscribed'])->group(function () {});

Route::put('post/{id}', function ($id) {
    //
})->middleware('role:editor');

//Acara 17
Route::get('/session', [SessionController::class, 'index']);
Route::get('/session/create', [SessionController::class, 'create']);
Route::get('/session/show', [SessionController::class, 'show']);
Route::get('/session/delete', [SessionController::class, 'delete']);

Route::get('/pegawai{nama}', [PegawaiController::class, 'index']);
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses'])->name('formulir.proses');

//Acara 18
Route::get('/cobaerror/{nama}', [CobaController::class, 'index']);