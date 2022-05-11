<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        $image = $this->image()->first();
        $path = asset('img/imagedefault.jpg');

        if ($image)
        {
            if (Storage::disk(config('filesystems.images_disk'))->exists($this->id.'/'.$image->image_name))
            {
                $path = asset('storage/images/'.$this->id.'/'.$image->image_name);
            }
        }

        return [
            'id' => $this->id,
            'reference' => $this->reference,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'user_name' => $this->user->name,
            'image' =>  $path
        ];
    }
}
