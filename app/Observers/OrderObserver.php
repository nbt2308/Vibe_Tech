<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
        if ($order->isDirty('status') && $order->status === 'cancelled') {
            $user = $order->user;

            //Chỉ xét user tồn tại, là khách hàng (user_type = 0) và tài khoản chưa bị khóa (status != 0)
            if ($user && $user->user_type == 0 && $user->status != 0) {
                
                // Đếm tổng số đơn đã huỷ của user này
                // $cancelCount = Order::where('user_id', $user->id)
                //                     ->where('status', 'cancelled')
                //                     ->whereColumn('updated_by', 'user_id')
                //                     ->count();
                $cancelCount = $user->orders()->where('status','cancelled')->count();
                // Nếu huỷ từ 5 đơn trở lên -> Khóa tài khoản
                if ($cancelCount >= 5) {
                    $user->update(['status' => 0]);
                }
            }
        }
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
