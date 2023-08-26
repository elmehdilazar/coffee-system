<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total',
        'status',
        'first_name',
        'last_name',
        'email',
        'phone',
        'city',
        'address',
        'zip_code'

    ];
    protected $table = 'orders';
    public $timestamps = true;
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    function DetailesOrder()  {
     return $this->hasMany(DetailesOrder::class, "order_id");
    }
    function reviews()
    {
        return $this->morphMany(Reviews::class, "reviewable");
    }
}
