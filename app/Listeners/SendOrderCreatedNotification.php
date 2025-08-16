<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\User;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Log;


class SendOrderCreatedNotification
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

        // تحميل relation 
        $order->load('billingAddress');

        $users = User::where('store_id', $order->store_id)->get();

        if ($users->isNotEmpty()) {
            foreach ($users as $user) {
                $user->notify(new OrderCreatedNotification($order));
            }
        } else {
            Log::warning("⚠ No users found for store_id: {$order->store_id}");
        }
    }
}
