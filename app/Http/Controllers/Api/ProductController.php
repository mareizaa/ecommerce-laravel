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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $product = Product::paginate();
        return ProductResource::collection($product);
    }

    public function store(ProductStoreRequest $request, StoreProductImagesAction $imagesAction, StoreProductAction $storeAction): ProductResource
    {
        $product = $storeAction->execute($request, $imagesAction);

        return new ProductResource($product);
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    public function update(ProductUpdateRequest $request, Product $product, StoreProductImagesAction $imagesAction, UpdateProductAction $updateAction): ProductResource
    {
        $product = $updateAction->execute($request, $product, $imagesAction);

        return new ProductResource($product);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json([
            "message" => 'Product Removed'
        ]);
    }
}
