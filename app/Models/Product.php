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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'reference',
        'id',
        'name',
        'description',
        'price',
        'quantity',
        'status',
    ];
}
