<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'slug',
    ];
    protected static function booted()
    {
        // Tự động chạy trước khi tạo mới (Create)
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name, '-');
            }
        });

        // Tự động chạy trước khi cập nhật (Update)
        static::updating(function ($category) {
            if ($category->isDirty('name')) {
                $category->slug = Str::slug($category->name, '-');
            }
        });
    }
    //1 danh mục có nhiều sản phẩm
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
