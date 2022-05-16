<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductShowController extends Controller
{
    public function home(): view
    {
        $products = Product::with([
            'image' => function ($query) {
                $query->select(['images.id', 'images.image_name', 'images.product_id']);
            },
        ])
        ->where('status', 1)->paginate(8);
        return view('welcome', compact('products'));
    }

    public function show(Product $product): view
    {
        return view('products.show', compact('product'));
    }
}
