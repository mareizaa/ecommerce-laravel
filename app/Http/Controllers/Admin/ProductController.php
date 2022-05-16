<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\Products\ProductStoreRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Actions\StoreProductImagesAction;
use App\Actions\StoreProductAction;
use App\Actions\UpdateProductAction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:products');
    }

    public function index(): view
    {
        $products = Product::select(['id', 'name', 'description', 'price', 'quantity', 'status'])->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create(): view
    {
        return view('products.create');
    }

    public function store(ProductStoreRequest $request, StoreProductImagesAction $imagesAction, StoreProductAction $storeAction): RedirectResponse
    {
        $product = $storeAction->execute($request, $imagesAction);

        return redirect(route('products.show', compact('product')));
    }

    public function edit(Product $product): view
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductUpdateRequest $request, Product $product, StoreProductImagesAction $imagesAction, UpdateProductAction $updateAction): RedirectResponse
    {
        $product = $updateAction->execute($request, $product, $imagesAction);

        return redirect(route('products.show', compact('product')));
    }
}
