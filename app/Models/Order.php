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
        'reason_cancel',
        'updated_by',
        'updated_by_user_type',
    ];

    public function getFormattedStatusAttribute()
    {
        $statuses = [
            'pending' => 'Chờ xác nhận',
            'confirmed' => 'Đã xác nhận',
            'shipping' => 'Đang giao hàng',
            'completed' => 'Đã hoàn thành',
            'cancelled' => 'Đã hủy',
        ];

        return $statuses[$this->status] ?? 'Không xác định';
    }
    public function getStatusBadgeAttribute()
    {
        return match ($this->status) {
            'pending' => 'bg-amber-100 text-amber-700',
            'confirmed' => 'bg-blue-100 text-blue-700',
            'shipping' => 'bg-purple-100 text-purple-700',
            'completed' => 'bg-emerald-100 text-emerald-700',
            'cancelled' => 'bg-rose-100 text-rose-700',
            default => 'bg-slate-100 text-slate-700',
        };
    }
    public function getStatusIconAttribute()
    {
        return match ($this->status) {
            'pending' => '<i class="fas fa-clock mr-1"></i>',
            'confirmed' => '<i class="fas fa-check mr-1"></i>',
            'shipping' => '<i class="fas fa-shipping-fast mr-1"></i>',
            'completed' => '<i class="fas fa-check-circle mr-1"></i>',
            'cancelled' => '<i class="fas fa-times-circle mr-1"></i>',
            default => '<i class="fas fa-question-circle mr-1"></i>',
        };
    }

    public function getFormattedTotalAmountAttribute()
    {
        return $this->total_amount ? number_format($this->total_amount, 0, ',', '.') . 'đ' : null;
    }

    public function getFormattedCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->created_at)->format('H:i, d/m/Y');
    }
    public function getFormattedUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->updated_at)->format('H:i, d/m/Y');
    }
    public function getFormattedShippingFeeAttribute()
    {
        return $this->shipping_fee ? number_format($this->shipping_fee, 0, ',', '.') . 'đ' : null;
    }
    public function getFormattedSubTotalAttribute()
    {
        return $this->sub_total ? number_format($this->sub_total, 0, ',', '.') . 'đ' : null;
    }

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

    // Người cập nhật/huỷ đơn hàng
    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
