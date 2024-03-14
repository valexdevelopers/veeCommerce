<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductCategories extends Model
{
    use HasFactory, HasUlids;

   protected $table = 'product_categories';

   protected $fillable = [
    'category_id',
    'product_id',
    ];
}
