<?php

namespace App\Models;

use App\Models\Image;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'quantity',
        'status',
    ];
}
