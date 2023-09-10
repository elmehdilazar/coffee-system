<?php

namespace App\Livewire;

use App\Models\Order\Booking;
use Livewire\Component;
use App\Models\Order\Order;
use Livewire\WithPagination;

class Reviews extends Component
{
   public  $id;
   public $type;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {   if($this->type=="order"){
    $data=Order::find($this->id)->reviews()->paginate(3);
    }else{
            $data = Booking::find($this->id)->reviews()->paginate(3);
    }

        return view('livewire.reviews')->with([
            'data'=>$data
        ]);
    }
    function mount($id,$type){
$this->id=$id;
$this->type=$type;
    }
}
