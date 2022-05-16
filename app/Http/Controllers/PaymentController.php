<?php

namespace App\Http\Controllers;

use App\Helpers\OrderStatus;
use App\Models\Order;
use App\Requests\CreateRequest;
use Illuminate\Http\Request;
use App\Services\WebcheckoutService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    public function createSession(Request $request): RedirectResponse
    {
        $order = Order::where('user_id', auth()->id())
                    ->where('state', 'in_cart')->first();
        $payment = [
            'payment' => [
                'reference' => $order->id,
                'description' => 'payment #'.$order->id,
                'amount' => [
                    'currency' => $order->currency,
                    'total' => $order->total,
                ]
                ],
            'expiration' => date('c', strtotime('+30 minutes')),
            'returnUrl' => route('payments', [$order->id]),
            ];
        $data = (new CreateRequest($payment))->toArray();
        $session = (new WebcheckoutService())->createSession($data);
        if ($session['status']['status'] === "OK") {
            $order->state = OrderStatus::PENDING;
            $order->session_id = $session['requestId'];
            $order->session_url = $session['processUrl'];
            $order->save();
        }
        return redirect($order->session_url);
    }

    public function resultTransation(Request $request, $reference): View
    {
        $order = Order::find($reference);
        $items = $order->products()->get();
        $session = (new WebcheckoutService())->getInformation($order->session_id);
        $order->state = $session['status']['status'];
        $order->save();
        return view('cart.payments', compact(['items', 'order']));
    }
}
