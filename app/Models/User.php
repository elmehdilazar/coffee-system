<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Booking\Booking;
use App\Models\Order\Order;
use App\Models\Order\Reviews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    function Carts()
    {
        return $this->hasMany(Cart::class, 'user_id', 'id');
    }
    function Orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }
    function Bookings()  {
        return $this->hasMany(Booking::class,"user_id");

    }
    function reviews()  {
        return $this->hasMany(Reviews::class,"user_id");

    }
}
