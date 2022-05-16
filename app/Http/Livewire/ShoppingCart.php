<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer;
use phpDocumentor\Reflection\Types\Boolean;

class ShoppingCart extends Component
{
    public $products = [];
    public $total = 0;
    public $count;
    public $orderId;
    public $in;
    public $obj;

    protected $listeners = ['productAdded' => 'incrementProducts'];

    public function setProducts()
    {
        $this->products = [];
        $orderCurrent = Order::where('user_id', auth()->id())
        ->where('state', 'in_cart')->first();

        if ($orderCurrent) {
            $orderItem = OrderItem::where('order_id', $orderCurrent->id)->get();

            foreach ($orderItem as $item) {
                $product = Product::where('id', $item['product_id'])->first();
                $product_item = [
                    'name'=> $product['name'],
                    'amount'=> $item['amount'],
                    'quantity' => $item['quantity'],
                ];
                array_push($this->products, $product_item);
            }

            $this->countProducts();
            $this->total = 0;
            $this->sumTotal();
            Order::where('id', $orderCurrent->id)
                   ->update(['total' => $this->total]);
        }
    }

    public function incrementProducts($product)
    {
        $orderCurrent = Order::where('user_id', auth()->id())
                            ->where('state', 'in_cart')->first();

        if (!$orderCurrent) {
            $order = new Order();
            $order->user_id = auth()->id();
            $order->save();
            $order->products()->attach($product['id'], ['quantity' => $product['quantity'],
                'amount' => $product['price']]);
        //$item = new OrderItem();
            //$item->product_id = $product['id'];
            //$item->order_id = $order->id;
            //$item->quantity = $product['quantity'];
            //$item->amount = $product['price'];
            //$item->save();
        } else {
            $orderItem = OrderItem::where('order_id', $orderCurrent->id)->get();

            foreach ($orderItem as $item) {
                if ($item['product_id'] === $product['id']) {
                    $this->in = true;
                    $this->obj = $item;
                    break;
                }
            }
            if ($this->in) {
                OrderItem::where('order_id', $orderCurrent->id)
                ->where('product_id', $product['id'])
                ->update(['quantity' => ($this->obj['quantity'] + 1), 'amount' => ($this->obj['amount'] + $product['price'])]);
            } else {
                $item = new OrderItem();
                $item->product_id = $product['id'];
                $item->order_id = $orderCurrent->id;
                $item->quantity = 1;
                $item->amount = $product['price'];
                $item->save();
            }
        }
        $this->setProducts();
    }

    public function countProducts()
    {
        $this->count = count($this->products);
    }

    public function sumTotal()
    {
        foreach ($this->products as $product) {
            $this->total = ($this->total + $product['amount']);
        }
    }

    public function deleteProduct($product)
    {
        $clave = array_search($product, $this->products);
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
