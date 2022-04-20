<?php

namespace App\Jobs;

use App\Actions\GetStatusAction;
use App\Models\Order;
use App\Helpers\OrderStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GetStatusPaymentsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(GetStatusAction $getStatusAction)
    {
        $orders = Order::where('state', 'PENDING')->get();

        foreach ($orders as $order)
        {
            $getStatusAction->handle($order);
        }
    }
}
