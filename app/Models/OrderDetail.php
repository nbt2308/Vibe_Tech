<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'sku',
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
    ];

    public function getFormattedUnitPriceAttribute()
    {
        return $this->unit_price ? number_format($this->unit_price, 0, ',', '.') . 'đ' : null;
    }
    public function getFormattedTotalPriceAttribute()
    {
        return $this->quantity * $this->unit_price ? number_format($this->quantity * $this->unit_price, 0, ',', '.') . 'đ' : null;
    }
    //1 chi tiết đơn hàng thuộc về 1 đơn hàng
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    //1 chi tiết đơn hàng thuộc về 1 sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
