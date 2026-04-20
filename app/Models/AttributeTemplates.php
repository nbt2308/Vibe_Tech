<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AttributeTemplates extends Model
{
    //
    protected $fillable = ['name', 'display_name', 'suggested_values'];

    protected $casts = [
        'suggested_values' => 'array',
    ];
    protected static function booted()
    {
        // Tự động chạy trước khi tạo mới (Create)
        static::creating(function ($attributeTemplate) {
            if (empty($attributeTemplate->name)) {
                $attributeTemplate->name = Str::slug($attributeTemplate->display_name, '-');
            }
        });

        // Tự động chạy trước khi cập nhật (Update)
        static::updating(function ($attributeTemplate) {
            if ($attributeTemplate->isDirty('display_name')) {
                $attributeTemplate->name = Str::slug($attributeTemplate->display_name, '-');
            }
        });

        
    }
}
