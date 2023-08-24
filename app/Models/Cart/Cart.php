<?php

namespace App\Models\Cart;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    protected $table = 'carts';
    protected $fillable = [
        'prod_id',
        'user_id',
        'qte'

    ];
    public $timestamps = TRUE;
    public function Product(){
        return $this->belongsTo(Product::class,'prod_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
