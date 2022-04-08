<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class ShoppingCart extends Controller
{
    public function payment()
    {
        $order = Order::with([
            'items' => function ($query) {
                $query->select(['order_items.id', 'order_items.quantity', 'order_items.amount', 'order_items.product_id', 'order_items.order_id',]);
            }
        ])
        ->where('user_id', auth()->id())->where('state', 'in_cart')->first();
        //dd($order->items);
        return view('cart.shopping', compact('order'));
    }
}
