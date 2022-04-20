<?php

namespace App\Actions;

use App\Models\Order;
use App\Services\WebcheckoutService;

class GetStatusAction
{
    public function handle(Order $order)
    {
        $orderStatus = (new WebcheckoutService)->getInformation($order->session_id);
        if ($orderStatus['status']['status'] != "PENDING"){
            $order->state = $orderStatus['status']['status'];
            $order->save();
        }
    }
}
