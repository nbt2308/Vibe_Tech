<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ProductController;


use App\Http\Controllers\Admin\AttributeTemplatesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Client\CartsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

// Route cho người dùng đã đăng nhập
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //Route bình luận
    Route::post('/product/{productId}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

    //Route thêm vào giỏ hàng
    Route::post('/cart/add/{productId}', [CartsController::class, 'store'])->name('cart.store');
    //Route tăng/giảm số lượng sản phẩm trong giỏ hàng
    Route::put('/cart/changeQuantity/{cartItemId}', [CartsController::class, 'changeQuantity'])->name('cart.changeQuantity');
    //Route xoá sản phẩm khỏi giỏ hàng
    Route::get('/cart/delete/{cartItemId}', [CartsController::class, 'delete'])->name('cart.delete');
    //Route trang giỏ hàng
    Route::get('/cart', [CartsController::class, 'index'])->name('cart.index');
    //Route trang thanh toán
    Route::get('/payment', [OrderController::class, 'getDataForPayment'])->name('payment');
    //Route xử lý thanh toán
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    //Route trang đơn hàng
    Route::get('/order-history', [OrderController::class, 'orderHistory'])->name('order.orderHistory');
    //Route huỷ đơn hàng (user)
    Route::put('/order/cancel/{id}', [OrderController::class, 'cancelOrder'])->name('order.cancel');

    //Route trang danh sách yêu thích
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    //Route thêm sp vào danh sách yêu thích
    Route::post('/wishlist/add/{productId}', [WishlistController::class, 'store'])->name('wishlist.store');
    //Route xoá sp khỏi danh sách yêu thích
    Route::get('/wishlist/delete/{productId}', [WishlistController::class, 'delete'])->name('wishlist.delete');

});



// Route cho người dùng chưa đăng nhập
// Trang chủ
Route::get('/', function () {
    return view('user.home.index');
})->name('home');
//Route danh sách sản phẩm theo danh mục
Route::get('/categories/{slug}', [\App\Http\Controllers\Client\CategoryController::class, 'show'])->name('categories.show');
//Route xem chi tiết sản phẩm
Route::get('/products/{slug}', [\App\Http\Controllers\Client\ProductController::class, 'show'])->name('products.show');
Route::get('/search', [\App\Http\Controllers\Client\ProductController::class, 'search'])->name('search');





// Giới thiệu
Route::get('/gioi-thieu', function () {
    return view('user.home.index');
})->name('about');

//Liên hệ
Route::get('/lien-he', function () {
    return view('user.home.index');
})->name('contact');



// ROUTE CHO ADMIN 
Route::prefix('admin')->middleware(['auth', IsAdmin::class])->group(function () {
    // Page route
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/brands', [BrandController::class, 'index'])->name('brands');
    Route::get('/templates', [AttributeTemplatesController::class, 'index'])->name('templates');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/comments', [CommentController::class, 'index'])->name('comments');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');

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

    // Attribute templates CRUD route
    Route::post('/templates/store', [AttributeTemplatesController::class, 'store'])->name('admin.templates.store');
    Route::get('/templates/edit/{id}', [AttributeTemplatesController::class, 'edit'])->name('admin.templates.edit');
    Route::put('/templates/update/{id}', [AttributeTemplatesController::class, 'update'])->name('admin.templates.update');
    Route::get('/templates/delete/{id}', [AttributeTemplatesController::class, 'delete'])->name('admin.templates.delete');
    Route::get('/templates/destroy/{id}', [AttributeTemplatesController::class, 'destroy'])->name('admin.templates.destroy');

    // Product CRUD route 
    Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('admin.products.delete');
    Route::get('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // User CRUD route 
    Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');
    Route::get('/users/destroy/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    //Comment route
    Route::get('/comments/changeStatus/{id}', [CommentController::class, 'changeStatus'])->name('admin.comments.changeStatus');
    Route::get('/comments/delete/{id}', [CommentController::class, 'delete'])->name('admin.comments.delete');
    Route::get('/comments/destroy/{id}', [CommentController::class, 'destroy'])->name('admin.comments.destroy');

    //Order route
    Route::get('/orders/create', [OrderController::class, 'create'])->name('admin.orders.create');
    Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('admin.orders.edit');
    Route::put('/orders/update/{id}', [OrderController::class, 'update'])->name('admin.orders.update');


});
