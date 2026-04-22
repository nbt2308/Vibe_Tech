<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //  
    }

    public function saving(Product $product): void
    {

        if ($product->stock_quantity <= 0) {
            $product->status = 0; // Hết hàng
        } else {
            if ($product->status == 0) {
                $product->status = 1; // Còn hàng
            }
        }
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
        if ($product->isDirty('stock_quantity') && $product->stock_quantity <= 0 && $product->status != 0) {
            // updateQuietly để không gây ra vòng lặp vô tận của Observer
            $product->updateQuietly(['status' => 0]);
        } 
        
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
