<?php

namespace App\Actions;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Actions\StoreProductImagesAction;

class UpdateProductAction
{
    public function execute(object $request, Model $product, StoreProductImagesAction $imagesAction): Model
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');

        $product->save();

        if ($request->images != null) {
            $product->image()->delete();
            $imagesAction->execute($request->images, $product);
        }

        return $product;
    }
}
