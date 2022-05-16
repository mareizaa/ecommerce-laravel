<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use App\Actions\StoreProductImagesAction;
use App\Http\Requests\Products\ProductUpdateRequest;

class UpdateProductAction
{
    public function execute(ProductUpdateRequest $request, Model $product, StoreProductImagesAction $imagesAction): Model
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');

        if ($request->images != null) {
            $product->image()->delete();
            $imagesAction->execute($request->images, $product);
        }

        $product->save();
        return $product;
    }
}
