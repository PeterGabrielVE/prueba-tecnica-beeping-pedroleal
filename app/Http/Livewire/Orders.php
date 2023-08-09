<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\OrderService;

class Orders extends Component
{
    
    public $orders;

    public function mount(OrderService $orderService)
    {
        try {
            $this->orders = $orderService->getTotalQty();
        } catch (Exception $e) {
            dd('There was an error fetching the data.');
        }
    }

    public function render()
    {
        return view('livewire.orders', ['orders' => $this->orders]);
    }
}
