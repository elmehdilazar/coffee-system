<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin\admin;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class AdmisDashboard extends Component
{

    public $name;
    public $email;
    public $editing = false;
    public $AdminId;
    public $adding = false;
    public $search='';


    public $password;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        "name" => 'required|string',
        "email" => 'required|string|email',
        "password" => 'required|min:6',
    ];

    public function addingT()
    {
        $this->adding = true;
    }
    public function close()
    {
        $this->adding = false;
        $this->editing = false;
    }
    public function render()
    {
        return view('livewire.admis-dashboard')->with([
            "admins" => admin::where('name', 'like', '%' . $this->search . '%')->paginate(5)
        ]);
    }
    function editingAdmin()
    {
        $this->validate();
        $admin = admin::find($this->AdminId);
        $admin->name = $this->name;
        $admin->email = $this->email;
        $admin->password = Hash::make($this->password);
        $admin->update();
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->editing = false;
        session()->flash('success', 'edited as successfully');
        $this->resetPage();
    }
    function addAdmin()
    {
        $this->validate();
        $newAdmin = new admin();

        $newAdmin->name = $this->name;
        $newAdmin->email = $this->email;
        $newAdmin->password = Hash::make($this->password);
        $newAdmin->save();
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->adding = false;
        $this->resetPage();
        session()->flash('success', 'add as successfully');
    }
    function getAdmin($id)
    {
        $this->editing = TRUE;
        $admin = admin::find($id);
        $this->AdminId = $admin->id;
        $this->name = $admin->name;
        $this->email = $admin->email;
        $this->editing = true;
    }
    function RemoveAdmin($id)
    {
        $admin = admin::find($id);
        $admin->delete();
        session()->flash('success', 'deleted as successfully');
        $this->resetPage();
    }
}
