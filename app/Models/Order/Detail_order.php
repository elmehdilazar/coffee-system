<?php

namespace App\Models\Order;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_order extends Model
{
    use HasFactory;
    protected $table = 'detail_orders';
    protected $fillable =
    [
        'prod_id',
        'qte' ,
        'order_id'
    ];
    public function product() {
        return $this->belongsTo(Product::class,'prod_id');
    }
    public function Order()
    {
        return $this->belongsTo(Product::class, 'order_id');
    }
    public $timestamps = false;

}
