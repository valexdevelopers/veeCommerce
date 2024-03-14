<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use App\Models;

class Cart extends Model
{
    use HasFactory, HasUlids;

    protected $table ='carts';
    
    /**
     * fillable - mass assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'inventory_id',
        'product_id',
        'session_id',
        'color',
        'size',
        'price',
        'quantity',
        'subtotal',

    ];

    public function cartProducts(){
        return $this->belongsTo(Models\Product::class, 'product_id');
    }
}
