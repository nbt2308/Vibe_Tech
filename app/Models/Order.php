<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code',
        'user_id',
        'total_amount',
        'sub_total',
        'status',
        'payment_method',
        'payment_status',
        'shipping_fee',
        'note',
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_address',
    ];

    //1 đơn hàng thuộc về 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //1 đơn hàng có nhiều chi tiết đơn hàng
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
