<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Product\Product;
use App\Models\Categories\Category;
use Illuminate\Support\Facades\File;

class Products extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $editing = false;
    public $adding = false;
    public $name;
    public $description;
    public $price;
    public $product_id;
    public $category;
    public $CatEdit;
    public $imgEdit;
    public $image;
    protected $rules = [
        'name' => 'required|min:6',
        'price' => 'required|min:0',

        'description' => 'required|min:10|max:2000',

        'image' => 'image|max:3072',
    ];

    use WithFileUploads;
    public function addingT()
    {
        $this->adding = true;
    }
    public function close()
    {
        $this->adding = false;
        $this->editing = false;
    }

    public $search = '';

    function addProduct()
    { $this->validate();
;        $product = Product::create(
            [
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'cat_id' => $this->category,
                'image' => $this->saveImage(),

            ]

        );
        $this->name = '';
        $this->description = '';
        $this->image = '';
        $this->price = '';
        $this->category = '';
        $this->resetPage();
        session()->flash('success', 'product successfully added.');
    }
    public function render()
    {
        return view('livewire.products')->with([
            "products" => Product::orderBy('id', 'DESC')
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->paginate(6),
            "categories" => Category::All()
        ]);
    }
    private  function saveImage()
    {
        $this->image->storeAs('images', $this->image->getClientOriginalName(), 'public');
        return $this->image->getClientOriginalName();
    }
    public  function getProduct($id)
    {
        $this->editing = true;
        $this->product_id = $id;
        $product = Product::find($id);
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->imgEdit = $product->image;
         $this->CatEdit=$product->Category;
         $this->category=$product->Category->id;



    }
    function editingProduct()
    {
        $this->validate();
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->description = $this->description;
        $product->price = $this->price;
        $product->cat_id = $this->category;
        if($product->image!==$this->image){

            if (File::exists(public_path("./storage/images/" . $product->image))) {
                File::delete(public_path("./storage/images/" . $product->image));

            }
            $product->image = $this->saveImage();
        }
        $product->update();
            $this->name = '';
            $this->description = '';
            $this->image = '';
            $this->price = '';
            $this->category = '';
        $this->editing = false;
        $this->resetPage();
        session()->flash('success', 'product successfully updated.');
}
   function removeProduct($id){
        $product = Product::find($id);

  $product->delete();

            if (File::exists(public_path("./storage/images/" . $product->image))) {
                File::delete(public_path("./storage/images/" . $product->image));
            }

            $this->resetPage();
        session()->flash('success', 'product successfully deleted.');
    }
}
