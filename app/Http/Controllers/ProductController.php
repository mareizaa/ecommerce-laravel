<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\Products\ProductStoreRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Actions\StoreProductImagesAction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): view
    {
        $products = Product::with([
            'image' => function ($query) {
                $query->select(['images.id', 'images.image_name', 'images.product_id']);
            },
        ])
        ->paginate(5);
        return view('products.index', compact('products'));
    }

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

    public function create(): view
    {
        return view('products.create');
    }

    public function store(ProductStoreRequest $request, StoreProductImagesAction $imagesAction): RedirectResponse
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

    public function show(Product $product): view
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product): view
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductUpdateRequest $request, Product $product, StoreProductImagesAction $imagesAction): RedirectResponse
    {
        $data = $request->only('name', 'description', 'status', 'price', 'quantity');

        $product->update($data);

        if ($request->images != null) {
            $product->image()->delete();
            $imagesAction->execute($request->images, $product);
        }

        return redirect(route('products.show', compact('product')));
    }
}
