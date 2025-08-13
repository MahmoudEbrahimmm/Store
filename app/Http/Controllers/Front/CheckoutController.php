<?php

namespace App\Http\Controllers\Front;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\Cart\CartRepositry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Intl\Countries;
use Throwable;

class CheckoutController extends Controller
{
    public function create(CartRepositry $cart)
    {
        if ($cart->get()->count() == 0) {
            return redirect()->route('home');
        }
        return view('front.checkout', [
            'cart' => $cart,
            'countries' => Countries::getNames(),
        ]);
    }
    public function store(Request $request, CartRepositry $cart)
    {
        $request->validate([
            'addr.*.first_name'      => 'required|string|max:255',
            'addr.*.last_name'       => 'required|string|max:255',
            'addr.*.email'           => 'required|email|max:255',
            'addr.*.phone_number'    => 'nullable|string|max:50',
            'addr.*.street_address'  => 'required|string|max:255',
            'addr.*.city'            => 'required|string|max:255',
            'addr.*.postal_code'     => 'required|string|max:50',
            'addr.*.state'           => 'required|string|max:255',
            'addr.*.country'         => 'nullable|string|max:255',
        ]);
        $items = $cart->get()->groupBy('product.store_id')->all();

        DB::beginTransaction();
        try {
            foreach ($items as $store_id => $cart_items) {
                if (empty($store_id) || !is_numeric($store_id)) {
                    continue;
                }
                $order = Order::create([
                    'store_id' => (int) $store_id,
                    'user_id' => Auth::id(),
                    'payment_method' => 'cod',
                ]);

                foreach ($cart_items as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'product_name' => $item->product->name,
                        'price' => $item->product->price,
                        'quantity' => $item->quantity,
                    ]);
                }
                foreach ($request->post('addr') as $type => $address) {
                    $address['type'] = $type;
                    $address['phone_number'] = $address['phone_number'] ?? '';
                    $address['country'] = $address['country'] ?? '';
                    $order->addresses()->create($address);
                }
            }

            DB::commit();

            // event('order.created', $order, Auth::user());
            event(new OrderCreated($order));
            
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        return redirect()->route('home');
    }
}
