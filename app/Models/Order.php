<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use App\Models;

class Order extends Model
{
    use HasFactory, SoftDeletes, HasUlids;
    
    protected $table = 'orders';
    /**
     * fillable - mass assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'unique_id',
        'user_id',
        'coupon_id',
        'order_details',
        'total',
        'coupon_discount',
        'order_status',
        'order_notes',
    ];

    public function orderUser(){
        return $this->belongsTO(Models\User::class, 'user_id');
    }

    public function orderCoupon(){
        return $this->belongsTO(Models\Coupon::class, 'coupon_id');
    }
}
