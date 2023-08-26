<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = ['name','message', 'reviewable_id', 'reviewable_type'];
    public $timestamps = true;
    protected $table = 'reviews';

    function reviewable()  {
        return $this->morphTo();


    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
