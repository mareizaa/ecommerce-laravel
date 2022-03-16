<?php

namespace App\Actions;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Actions\StoreProductImagesAction;

class StoreProductAction
{
    public function execute(object $request, StoreProductImagesAction $imagesAction): Model
    {
        $product = new Product();
        $product->user_id = auth()->id();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');

        $product->save();

        $imagesAction->execute($request->images, $product);
        return $product;
    }
}
