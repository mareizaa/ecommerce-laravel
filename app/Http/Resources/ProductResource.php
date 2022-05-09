<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        $image = $this->image()->first();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'user_name' => $this->user->name,
            //'image' => asset('storage/images/'.$this->id.'/'.$image->image_name)
        ];
    }
}
