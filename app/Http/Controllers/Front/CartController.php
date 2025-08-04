<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepositry;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CartRepositry $cart)
    {
        
        return view('front.cart',[
            'cart' => $cart,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,CartRepositry $cart)
    {
        $request->validate([
            'product_id'=>['required','int','exists:products,id'],
            'quantity'=>['nullable','int','min:1'],
        ]);

        $product = Product::findOrFail($request->post('product_id'));
        $cart->add($product,$request->post('quantity'));

        return redirect()->route('cart.index')
        ->with('success','Product added to cart!');
    }

    public function update(Request $request,CartRepositry $cart)
    {
        $request->validate([
            'product_id'=>['required','int','exists:products,id'],
            'quantity'=>['nullable','int','min:1'],
        ]);
        $product = Product::findOrFail($request->post('product_id'));
        
        $cart->update($product,$request->post('quantity'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartRepositry $cart, $id)
    {
        $cart->delete($id);
    }
}
