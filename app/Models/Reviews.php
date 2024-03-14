<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illumintae\Database\Eloquent\SoftDeletes;



class Reviews extends Model
{
    use HasFactory, SoftDeletes, HasUlids;

    protected $table = 'product_reviews';
    
    /**
     * fillable - mass assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'order_id',
        'user_id',
        'number_of_stars',
        'review_comment'
    ];
}
