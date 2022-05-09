<?php

namespace App\Actions;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Actions\StoreProductImagesAction;
use App\Http\Requests\Products\ProductStoreRequest;

class UpdateProductAction
{
    public function execute(array $data, ?Model $product = null, StoreProductImagesAction $imagesAction): Model
    {
        if (!$product)
        {
            $product = new Product();
            $product->user_id = Arr::get($data, 'user_id');
            $product->reference = Arr::get($data, 'reference');
        }

        $product->name = Arr::get($data, 'name');
        $product->description = Arr::get($data, 'description');
        $product->price = Arr::get($data, 'price');
        $product->quantity = Arr::get($data, 'quantity');

        $product->save();

        if (Arr::get($data, 'image')) {
            $product->image()->delete();
            $imagesAction->execute(Arr::get($data, 'image'), $product);
        }

        return $product;
    }

    public function storeOrUpdateFromRequest(object $request, ?Model $product = null, StoreProductImagesAction $imagesAction)
    {
        return self::execute([
            'user_id' => auth()->id(),
            'reference' => $request->input('reference'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'image' => $request->images
        ], $product, $imagesAction);
    }
}
