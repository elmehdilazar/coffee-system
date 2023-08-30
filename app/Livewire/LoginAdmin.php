<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginAdmin extends Component
{
    public  $email;
    public $password;

    protected $rules = [

        'email' => 'required',
        'password' => 'required'
    ];



    public function render()
    {
         return view('livewire.login-admin');
    }
    public function login()  {
   $this->validate();

        if (auth()->guard('admin')->attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('success', 'user connected successfully .');
            return  Redirect::route("admin.home");
        } else {
            session()->flash('error', 'user not  connected.');

        }

    }

}
