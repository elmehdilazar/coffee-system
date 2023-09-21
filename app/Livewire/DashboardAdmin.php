<?php

namespace App\Livewire;


use App\Models\User;
use Livewire\Component;
use App\Models\Admin\admin;
use App\Models\Order\Order;
use App\Models\Order\Booking;
use App\Models\Order\Reviews;
use Illuminate\Support\Facades\DB;

class DashboardAdmin extends Component
{
    public  $countCustomers=0;
    public  $countOrders=0;
    public  $countBookings=0;
    public  $countReviews=0;
    public $dataChart;
    public $total=0;
    public $LatestReviwes=null;
    public $chartReviewsOrder;
    public $chartReviewsBooking;
    public function mount()
    {
        $this->countCustomers=$this->CustomersCount();
        $this->countBookings=$this->BookingsCount();
        $this->countOrders=$this->OrdersCount();
       $this->dataChart= $this->chart();
       $this->total=Order::all()->sum("total");
       $this->LatestReviwes=$this->LatestReviwes();
       $this->chartReviewsOrder=$this->reviewChartsOrder();
       $this->chartReviewsBooking=$this->reviewChartsBooking();
       $this->countReviews=$this->ReviwesCount();
    }
    public function render()
    {
        return view('livewire.dashboard-admin');
    }
    function CustomersCount()  {
        return User::count();

    }
    function ReviwesCount()  {
        return Reviews::count();

    }
    function OrdersCount()  {
        return Order::count();

    }
    function BookingsCount()  {
        return Booking::count();

    }
    function LatestReviwes()  {
        return Reviews::latest()->take(5)->get();;

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
    function reviewChartsOrder()
    {
        $ordersByDay = DB::table('reviews')
        ->select(DB::raw('DAYNAME(created_at) as day'), DB::raw('COUNT(*) as total'))
        ->groupBy('day')
            ->where("reviewable_type",  "App\Models\Order\Order")
        ->get();

        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $chartData = [];

        foreach ($daysOfWeek as $day) {
            $chartData[$day] = 0;
        }

        foreach ($ordersByDay as $order) {
            $chartData[$order->day] = $order->total;
        }
        return  $chartData;
    }
    function reviewChartsBooking()
    {
        $ordersByDay = DB::table('reviews')
        ->select(DB::raw('DAYNAME(created_at) as day'), DB::raw('COUNT(*) as total'))
        ->groupBy('day')
        ->where("reviewable_type", "App\Models\Order\Booking")
        ->get();

        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
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
