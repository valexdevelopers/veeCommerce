<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrductDetails extends Model
{
    use HasFactory;

    protected $table = 'product_details';
    
    /**
     * fillable - mass assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'about',
        'technical_details',
    ];
}
