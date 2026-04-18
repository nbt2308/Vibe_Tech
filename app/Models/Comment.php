<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment_content',
        'comment_rating',
        'comment_status',
        'user_id',
        'product_id',
    ];

    public function getFormattedStatusAttribute()
    {
        return $this->comment_status == 1 ? 'Hiển thị' : 'Đã ẩn';
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()   
    {
        return $this->belongsTo(Product::class);
    }
}
