<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.logout');
    }
    public function logout()  {
            if(Auth::guard("admin")->logout()){
            return redirect()->route('admins.login');
            }

    }
}
