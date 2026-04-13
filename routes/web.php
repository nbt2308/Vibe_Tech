<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

// Trang chủ
Route::get('/', function () {
    return view('user.home.index');
})->name('home');

// Products
// Route::get('/san-pham', function () {
//     return view('user.home.index'); // Placeholder view
// })->name('products');

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
    // Page route
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/brands', [BrandController::class, 'index'])->name('brands');
    
    // Categories CRUD route
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');
    Route::get('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
   
    // Brands CRUD route
    Route::post('/brands/store', [BrandController::class, 'store'])->name('admin.brands.store');
    Route::get('/brands/edit/{id}', [BrandController::class, 'edit'])->name('admin.brands.edit');
    Route::put('/brands/update/{id}', [BrandController::class, 'update'])->name('admin.brands.update');
    Route::get('/brands/delete/{id}', [BrandController::class, 'delete'])->name('admin.brands.delete');
    Route::get('/brands/destroy/{id}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');

    // Product CRUD route 
    Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('admin.products.delete');
    Route::get('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});
