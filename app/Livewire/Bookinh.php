<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order\Booking;

class Bookinh extends Component
{   use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $status = '';
    public $search = '';
    public function render()
    {
        return view('livewire.bookinh')->with([
            'bookings' => Booking::where('status', 'like', '%' . $this->search . '%')
                ->orWhere('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->paginate(6)
        ]);
    }
    function updateStatus($id)
    {
        $Booking = Booking::find($id);
        $Booking->status = $this->status;
        $Booking->update();
        $this->resetPage();
        session()->flash('success', 'Booking successfully updated.');
    }
    function removeBooking($id)  {
        $Booking = Booking::find($id);
        if($Booking->delete()){
            session()->flash('success', 'Booking successfully deleted.');
        }else{
            session()->flash('error', 'Booking  not  deleted.');
        }

    }

}
