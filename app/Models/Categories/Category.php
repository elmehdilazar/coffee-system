<?php

namespace App\Models\Categories;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $table = "categories";
    protected $fillable = ['name'];
    public $timestamps = true;
   public  function Products()  {
        return $this->hasMany(Product::class, 'cat_id','id');


    }
}
