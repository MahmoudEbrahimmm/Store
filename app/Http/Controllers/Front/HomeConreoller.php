<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeConreoller extends Controller
{
    public function index(){


        $products = Product::with('category')->active()
        // ->latest()
        // ->limit(8)
        ->get();

        $products_trending = Product::with('category')->active()
        ->latest()
        ->limit(4)
        ->get();
        $products_featured = Product::with('category')->active()
        ->latest()
        ->limit(8)
        ->get();

        $products_logo = Product::with('category')->active()
        ->latest()->limit(8)->get();
        
        $section = Product::with('category')->active()
        ->limit(2)->get();

        return view('front.home',compact('products',
        'products_trending',
            'products_logo',
            'products_featured',
        'section'));
        
    }
}
