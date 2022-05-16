<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View;

class ShoppingCart extends Controller
{
    public function payment(): View
    {
        $order = Order::where('user_id', auth()->id())
                    ->where('state', 'in_cart')->first();
        $items = $order->products()->get();
        return view('cart.shopping', compact(['items', 'order']));
    }
}
