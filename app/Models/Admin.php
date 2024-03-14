<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use App\Models;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasUlids, SoftDeletes, HasApiTokens, Notifiable;

   protected $table = 'admins';
   
   protected $guard = 'admin';

   
    /**
    * mass assignable attributes
    *
    * @var array<string, string>
    */
   protected $fillable = [
    'unique_id',
    'admin_verified_at',
    'isSuperAdmin',
    'firstname',
    'lastname',
    'email',
    'phone',
    'password'
    ];

    /**
    * attitbutes that should be hidden from serialization
    *
    * @var array<int, string>
    *
    */
    protected $hidded = [
        'remember_token',
        'password'
    ];


    /** 
    * attributes that should be cast
    *
    * @var array<string, string>
    *
    */
    protected $cast = [
        'admin_verified_at' => 'datetime',
        'password' => 'hashed'
    ];


    // relationships

    public function adminProduct(){
        return $this->hasMany(Models\Product::class, 'admin_id');
    }
}
