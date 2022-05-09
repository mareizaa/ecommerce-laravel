<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Actions\StoreProductAction;
use App\Actions\StoreProductImagesAction;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Actions\UpdateProductAction;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::paginate();
        return ProductResource::collection($product);
    }

    public function store(ProductStoreRequest $request, StoreProductImagesAction $imagesAction, UpdateProductAction $storeAction)
    {
        $product = $storeAction->storeOrUpdateFromRequest($request, null, $imagesAction);

        return redirect()->route('api.products.show', $product);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function update(ProductUpdateRequest $request, Product $product, StoreProductImagesAction $imagesAction, UpdateProductAction $updateAction): RedirectResponse
    {
        $product = $updateAction->storeOrUpdateFromRequest($request, $product, $imagesAction);

        return redirect()->route('api.products.show', $product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            "message" => 'Product Removed'
        ]);
    }
}
