<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $fillable = [
        'user_id'
    ];
    public function cart_items()
    {
        return $this->hasMany(Cart_items::class,'cart_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
