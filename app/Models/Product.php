<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'status',
    ];
}
