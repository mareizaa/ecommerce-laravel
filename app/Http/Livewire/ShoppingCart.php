<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Component
{
    public $products = [];
    public $count;

    protected $listeners = ['postAdded' => 'incrementProducts'];

    public function incrementProducts($product)
    {
        array_push($this->products, $product);
        $this->countProducts();
    }

    public function countProducts()
    {
        $this->count = count($this->products);
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
