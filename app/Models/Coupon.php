<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes, HasUlids;

    protected $table = 'coupons';

    
    /**
     * fillable - mass assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'unique_id',
        'coupon_code',
        'coupon_worth',
        'max_value',
        'usuage',
        'coupon_resctriction',
    ];
}
