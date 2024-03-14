<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
class Inventory extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'inventories';
    
    /**
     * fillable - mass assignable attributes
     *
     * @var array
     */
    protected $fillable =[
        'product_id',
        'stock_quantity',
    ];

    //RELATIONSHIPS
    public function inventoryProduct(){
        return $this->belongsTo(Models\Product::class, 'product_id');
    }

}
