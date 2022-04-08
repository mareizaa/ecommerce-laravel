<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
                    ->withPivot('quantity', 'amount');
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
