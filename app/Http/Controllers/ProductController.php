<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Products\ProductStoreRequest;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function store(ProductStoreRequest $request)
    {
        $product = new Product();
        $product->user_id = auth()->id();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');

        $product->save();

        $file = $request->images;
        $image = new Image();
        $image->product_id = $product->id;
        $image->image_name = (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($product->id, $image->image_name, config('filesystems.images_disk'));

        $product->image()->save($image);

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

    public function update(Request $request, Product $product)
    {
        $data = $request->only('name', 'description', 'status', 'price', 'quantity');

        $product->update($data);

        if ($request->images != null)
        {
            $file = $request->images;
            $image = new Image();
            $image->product_id = $product->id;
            $image->image_name = (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs($product->id, $image->image_name, config('filesystems.images_disk'));
            $product->image()->delete();
            $product->image()->save($image);
        }

        return redirect(route('products.show', compact('product')));
    }

    public function destroy(Product $product)
    {
        //
    }
}
