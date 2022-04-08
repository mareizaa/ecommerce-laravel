<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ShoppingCart extends Controller
{
    public function payment()
    {
        $order = Order::where('user_id', auth()->id())
                    ->where('state', 'in_cart')->first();
        $items = $order->products()->get();
        return view('cart.shopping', compact(['items', 'order']));
    }
}
