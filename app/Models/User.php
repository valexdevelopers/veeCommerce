<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
Use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

use App\Models;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'unique_id',
        'firstname',
        'lastname',
        'email',
        'phone',
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

    public function cartsOwned(){
        return $this->hasMany(Models\Cart::class, 'user_id');
    }

    public function ownedaddress(){
        return $this->hasOne(Models\Address::class, 'user_id');
    }

    public function wishlistowned(){
        return $this->hasMany(Models\Wishlist::class, 'user_id');
    }

    public function purchases(){
        return $this->hasMany(Models\Purchase::class, 'user_id');
    }

    public function userOrders(){
        return $this->hasMany(Models\Order::class, 'user_id');
    }
}
