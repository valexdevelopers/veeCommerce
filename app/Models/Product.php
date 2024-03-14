<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\Hasulids;
use Illuminate\Database\Eloquent\Softdeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models;

class Product extends Model
{
    use HasFactory, Hasulids, Softdeletes;

    protected $table = 'products';
    
    /**
     * fillable - mass assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'unique_id',
        'admin_id',
        'brand_id',
        'product_name',
        'product_price',
        'product_discount_price',
        'promo_id',
        'product_image_1',
        'product_image_2',
        'product_image_3',
        'product_image_4',
        'product_image_5',
        
        
    ];

    // relationships

    public function productBrands(){
        return $this->belongsTo(Models\Brand::class, 'brand_id');
    }

    public function productAdmin(){
        return $this->belongsTo(Models\Admin::class, 'admin_id');
    }
    
    /**
     * The roles that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function productCategories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }


    public function productInventory(){
        return $this->hasOne(Models\Inventory::class, 'product_id');
    }

    public function productDetails(){
        return $this->hasOne(Models\PrductDetails::class, 'product_id');
    }

    // public function productDetails(){
    //     return $this->hasOne(Models\PrductDetails::class, 'product_id');
    // }

}
