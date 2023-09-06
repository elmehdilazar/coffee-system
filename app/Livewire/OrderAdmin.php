<?php

namespace App\Livewire;

use App\Models\Order\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderAdmin extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $status = '';
    public $search = '';

    public function render()
    {
        return view('livewire.order-admin')->with([
            'orders' => Order::where('status', 'like', '%' . $this->search . '%')
                ->orWhere('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->paginate(6)
        ]);
    }
    function updateStatus($id)
    {
        $order = Order::find($id);
        $order->status = $this->status;
        $order->update();
        $this->resetPage();
        session()->flash('success', 'order successfully updated.');
    }
}
