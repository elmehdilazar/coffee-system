<?php

namespace App\Livewire;

use App\Models\Categories\Category as CategoriesCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    public $name;
  public $adding=false;
  public $editing=false;
  public $search='';
  public $categoryId='';
    protected $rules = [
        "name" => 'required|string',

    ];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function addingT()
    {
        $this->adding = true;
    }
    public function close()
    {
        $this->adding = false;
        $this->editing = false;
        $this->name = "";
    }
    function editingCategory()
    {
        $this->validate();
        $category = CategoriesCategory::find($this->categoryId);
        $category->name = $this->name;

        $category->update();
        $this->name = "";

        $this->editing = false;
        session()->flash('success', 'edited as successfully');
        $this->resetPage();
    }
    function getCategory($id)
    {
        $this->editing = TRUE;
        $category = CategoriesCategory::find($id);
        $this->categoryId= $category->id;
        $this->name = $category->name;
        $this->editing = true;
    }
    function addCategory()
    {
        $this->validate();
        $newCategory = new CategoriesCategory();

        $newCategory->name = $this->name;
        $newCategory->save();
        $this->name = "";
        $this->adding = false;
        $this->resetPage();
        session()->flash('success', 'add as successfully');
    }
    function RemoveCategory($id)
    {
        $category = CategoriesCategory::find($id);
        $category->delete();
        session()->flash('success', 'deleted as successfully');
        $this->resetPage();
    }
    public function render()
    {


        return view('livewire.category')->with([
            "categories"=>CategoriesCategory::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'asc')->paginate(5)
        ]);
    }
}
