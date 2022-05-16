<?php

namespace App\Actions;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class ImportProductAction
{
    public function execute(array $data, ?Model $product = null): Model
    {
        if (!$product) {
            $product = new Product();
            $product->user_id = Arr::get($data, 'user_id');
            $product->reference = Arr::get($data, 'reference');
        }

        $product->name = Arr::get($data, 'name');
        $product->description = Arr::get($data, 'description');
        $product->price = Arr::get($data, 'price');
        $product->quantity = Arr::get($data, 'quantity');

        $product->save();

        $image = new Image();
        $image->product_id = $product->id;
        $image->image_name = asset('img/imagedefault.jpg');
        $product->image()->save($image);

        return $product;
    }
}
