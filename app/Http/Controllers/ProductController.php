<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Products\ProductStoreRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Actions\StoreProductImagesAction;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with([
            'image' => function ($query) {
                $query->select(['images.id', 'images.image_name', 'images.product_id']);
            },
        ])
        ->paginate(5);
        return view('products.index', compact('products'));
    }

    public function home()
    {
        $products = Product::with([
            'image' => function ($query) {
                $query->select(['images.id', 'images.image_name', 'images.product_id']);
            },
        ])
        ->where('status', 1)->paginate(8);
        return view('welcome', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductStoreRequest $request, StoreProductImagesAction $imagesAction)
    {
        $product = new Product();
        $product->user_id = auth()->id();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');

        $product->save();

        $imagesAction->execute($request->images, $product);

        return redirect(route('products.show', compact('product')));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductUpdateRequest $request, Product $product, StoreProductImagesAction $imagesAction)
    {
        $data = $request->only('name', 'description', 'status', 'price', 'quantity');

        $product->update($data);

        if ($request->images != null)
        {
            $product->image()->delete();
            $imagesAction->execute($request->images, $product);
        }

        return redirect(route('products.show', compact('product')));
    }

    public function destroy(Product $product)
    {
        //
    }
}
