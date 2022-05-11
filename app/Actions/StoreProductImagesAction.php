<?php

namespace App\Actions;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Str;

class StoreProductImagesAction
{
    public function execute(object $file, Product $product): void
    {
        $image = new Image();
        $image->product_id = $product->id;
        $image->image_name = (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs($product->id, $image->image_name, config('filesystems.images_disk'));

        $product->image()->save($image);
    }
}
