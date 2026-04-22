<?php

namespace App\Providers;

use App\Models\AttributeTemplates;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Observers\CommentObserver;
use App\Observers\OrderObserver;
use App\Observers\ProductObserver;
use Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();
        View::composer('*', function ($view) {
            $wishlistIds = [];
            
            if (Auth::check()) {
                // Lấy danh sách ID sản phẩm trong wishlist của user
                $wishlistIds = Auth::user()->wishlists()->pluck('product_id')->toArray();
            }
            
            $view->with('wishlistIds', $wishlistIds);
        });
        View::share('featured_categories', Category::with([
            'products' => function ($q) {
                $q->where('status', 1)->take(8)->with('brand')->orderBy('created_at', 'desc');
            }

        ])->where('status', 1)->take(4)->get());
        View::share('brands', Brand::where('status', 1)->get());
        View::share('categories', Category::where('status', 1)->get());
        View::share('list_products', Product::where('status', 1)->take(10)->orderBy('created_at', 'desc')->get());
        
        
        //Đky observer
        Comment::observe(CommentObserver::class);
        Order::observe(OrderObserver::class);
        Product::observe(ProductObserver::class);
    }
}
