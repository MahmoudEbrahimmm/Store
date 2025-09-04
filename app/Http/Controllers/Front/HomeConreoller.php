<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeConreoller extends Controller
{

    public function index()
    {
        $products         = Product::latestActive()->get();
        $products_trending = Product::latestActive(4)->get();
        $products_featured = Product::latestActive(8)->get();
        $products_logo     = Product::latestActive(8)->get();
        $section           = Product::latestActive(2)->get();

        return view('front.home', compact(
            'products',
            'products_trending',
            'products_featured',
            'products_logo',
            'section',
        ));
    }
}
