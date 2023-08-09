<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class Orders extends Component
{
    
    public $orders;

    public function mount()
    {
        try {
        $this->orders = Order::join('orders_lines','orders_lines.order_id','orders.id')
            ->join('products','products.id','orders_lines.product_id')
            ->select('orders_lines.id as id_order_line','products.name as name_product','orders.order_ref as order_ref','orders.customer_name','orders_lines.qty as order_line_qty', 'products.cost as product_cost')
            ->get()
            ->each(function ($order) {
                $order->total_qty = $order->order_line_qty * $order->product_cost;
            });
        } catch (Exception $e) {
            dd('There was an error fetching the data.');
        }
    }

    public function render()
    {
        return view('livewire.orders', ['orders' => $this->orders]);
    }
}
