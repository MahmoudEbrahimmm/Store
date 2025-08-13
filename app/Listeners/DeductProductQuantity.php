<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Facades\Cart;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class DeductProductQuantity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        $order = $event->order;
        // dd($order->products);
        foreach ($order->products as $product) {
            $product->decrement('quantity', $product->pivot->quantity);
        }

        //         foreach ($order->products as $product) {
        //     $qtyToDeduct = $product->pivot->quantity;

        //     if ($product->quantity >= $qtyToDeduct) {
        //         $product->decrement('quantity', $qtyToDeduct);
        //     } else {
        //          هنا ممكن ترمي Exception أو تسجل خطأ أو تمنع الطلب
        //         throw new \Exception("Not enough stock for product: {$product->name}");
        //     }
        // }

    }
}
