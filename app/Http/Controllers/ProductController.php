<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Products\ProductStoreRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select(['id', 'name', 'price', 'quantity', 'description', 'status'])->paginate(5);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductStoreRequest $request)
    {
        $product = new Product();
        $product->user_id = auth()->id();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');

        $product->save();

        $image = $request->images;
        $image->storeAs('images_product', Str::uuid() . '.' . $image->getClientOriginalExtension(), config('filesystems.images_disk'));

        return redirect(route('products.index'));
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
