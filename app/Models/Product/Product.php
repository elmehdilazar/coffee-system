<?php

namespace App\Models\Product;

use App\Models\Cart\Cart;
use App\Models\Categories\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table="products";
    public $fillable=[
        "name",
        'description',
        'price',
        'image'
    ];
    public $timestamps = true;
    function Category()  {
        return $this->belongsTo(Category::class,'cat_id','id');

    }
    function Carts()  {
  return $this->hasMany(Cart::class,'prod_id','id');
    }
}
