<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\support\Facades\Log;

use DB;

class OrderJob implements ShouldQueue
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
    public function handle()
    {
        $orders = DB::table('orders')
        ->join('orders_lines','orders_lines.order_id','orders.id')
        ->join('products','products.id','orders_lines.product_id')
        ->select('orders_lines.id', 'orders_lines.qty as order_line_qty', 'products.cost as product_cost')
        ->get()
        ->each(function ($order) {
            $order->total_cost = $order->order_line_qty * $order->product_cost;
        });

        dd($orders);
    }
}
