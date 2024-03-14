<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use App\Models;

class Brand extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $table = 'brands';
        
    /**
     * fillable - mass assignable attributes
     *
     * @var array<string, string>
     */
    protected $fillable = [
        'unique_id',
        'brand_name',
        'brand_image',
    ];

    public function brandsProduct(){
        return $this->hasMany(Models\Product::class, 'brand_id', 'id');
    }


}
