<?php

namespace App\Livewire;


use App\Models\User;
use Livewire\Component;
use App\Models\Admin\admin;
use App\Models\Order\Order;
use App\Models\Order\Booking;
use Illuminate\Support\Facades\DB;

class DashboardAdmin extends Component
{
    public  $countCustomers=0;
    public  $countOrders=0;
    public  $countBookings=0;
    public $dataChart;
    public $total=0;
    public function mount()
    {
        $this->countCustomers=$this->CustomersCount();
        $this->countBookings=$this->BookingsCount();
        $this->countOrders=$this->OrdersCount();
       $this->dataChart= $this->chart();
       $this->total=Order::all()->sum("total");
    }
    public function render()
    {
        return view('livewire.dashboard-admin');
    }
    function CustomersCount()  {
        return User::count();

    }
    function OrdersCount()  {
        return Order::count();

    }
    function BookingsCount()  {
        return Booking::count();

    }
    function chart()  {
        $ordersByDay = DB::table('orders')
        ->select(DB::raw('DAYNAME(created_at) as day'), DB::raw('COUNT(*) as total'))
            ->groupBy('day')
            ->orderBy(DB::raw('DAYOFWEEK(created_at)'))
            ->get();

        $daysOfWeek = [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday','Sunday'];
        $chartData = [];

        foreach ($daysOfWeek as $day) {
            $chartData[$day] = 0;
        }

        foreach ($ordersByDay as $order) {
            $chartData[$order->day] = $order->total;
        }
return  $chartData;
    }





}
