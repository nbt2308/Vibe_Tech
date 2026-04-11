<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

// Trang chủ
Route::get('/', function () {
    return view('user.home.index');
})->name('home');

// Products
Route::get('/san-pham', function () {
    return view('user.home.index'); // Placeholder view
})->name('products');

// Giới thiệu
Route::get('/gioi-thieu', function () {
    return view('user.home.index'); // Placeholder view
})->name('about');

//Liên hệ
Route::get('/lien-he', function () {
    return view('user.home.index'); // Placeholder view
})->name('contact');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    
});

// ROUTE CHO ADMIN 

Route::prefix('admin')->middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    
});
