<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'sku',
        'description',
        'thumbnail',
        'price',
        'sale_price',
        'stock_quantity',
        'slug',
        'status',
        'discount_percent'
    ];
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0, ',', '.') . 'đ';
    }
    public function getFormattedSalePercentAttribute()
    {
        if ($this->discount_percent > 0) {
            return $this->discount_percent . "%";
        }
        return null;
    }
    public function getFormattedSalePriceAttribute()
    {
        return $this->sale_price ? number_format($this->sale_price, 0, ',', '.') . 'đ' : null;
    }
    public function getFormattedStatusAttribute()
    {
        return $this->status == 1 ? 'Đang kinh doanh' : 'Ngừng bán';
    }
    protected static function booted()
    {
        // Tự động chạy trước khi tạo mới (Create)
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name, '-');
            }
        });

        // Tự động chạy trước khi cập nhật (Update)
        static::updating(function ($product) {
            if ($product->isDirty('name')) {
                $product->slug = Str::slug($product->name, '-');
            }
        });

        static::saving(function ($product) {
        if ($product->price > 0 && $product->sale_price > 0 && $product->sale_price < $product->price) {
            $product->discount_percent = round((($product->price - $product->sale_price) / $product->price) * 100);
        } else {
            $product->discount_percent = 0;
        }
    });
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
