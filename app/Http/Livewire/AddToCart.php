<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class AddToCart extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addproduct()
    {
        $this->emit('productAdded', $this->product);
    }
}
