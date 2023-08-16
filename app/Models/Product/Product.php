<?php

namespace App\Models\Product;

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
}
