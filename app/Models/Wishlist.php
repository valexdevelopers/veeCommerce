<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use App\Models;

class Wishlist extends Model
{
    use HasFactory, HasUlids;
    protected $table ='wishlists';
    
    /**
     * fillable - mass assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'inventory_id',
        'product_id',
        'color',
        'size',
        'price',

    ];

    public function wishlistProducts(){
        return $this->belongsTo(Models\Product::class, 'product_id');
    }

    public function wishlistowner(){
        return $this->belongsTo(Models\User::class, 'user_id');
    }
}
