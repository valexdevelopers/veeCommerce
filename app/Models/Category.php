<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models;

class Category extends Model
{
    use HasFactory, SoftDeletes, HasUlids;

    protected $table = 'categories';

        
    /**
     * fillable - mass assignable attributes
     *
     * @var array<string, string>
     */
    protected  $fillable = [
        'unique_id',
        'category_name',
        'category_image',
    ];

    // relationships

    
    public function CategoriesProduct(){
        
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id' );
        
    }

  
}
