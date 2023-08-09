<?php

namespace App\Services;


use Illuminate\Http\Request;
use DB;

class OrderService
{

    public function __construct()
    {

    }

    public function getTotalOrder()
    {
        try {
        
            $orders = Order::join('orders_lines','orders_lines.order_id','orders.id')
            ->join('products','products.id','orders_lines.product_id')
            ->select('orders_lines.id as id_order_line','products.name as name_product','orders.order_ref as order_ref','orders.customer_name','orders_lines.qty as order_line_qty', 'products.cost as product_cost')
            ->get()
            ->each(function ($order) {
                $order->total_cost = $order->order_line_qty * $order->product_cost;
            });

            return $orders;
        } catch (Exception $exception) {
            return ResponseHttp('Error', 500);
        }
    }

    
}
