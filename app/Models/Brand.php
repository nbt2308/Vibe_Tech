<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'logo'
    ];
    public function getFormattedStatusAttribute()
    {
        return $this->status == 1 ? 'Đang hoạt động' : 'Ngừng hoạt động';
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
