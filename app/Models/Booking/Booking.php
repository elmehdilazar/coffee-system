<?php

namespace App\Models\Booking;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'date',
        'time',
        'phone',
        'message',
        'user_id',
    ];
    public $timestamps = true;
    protected $table = 'bookings';
    function User()  {
        return $this->hasOne(User::class,"user_id");

    }
}
