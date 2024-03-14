<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\Hasulids;
use Illuminate\Database\Eloquent\Softdeletes;
use App\Models;


class Promo extends Model
{
    use HasFactory, Softdeletes, Hasulids;

    protected $table = 'promos';

    protected $fillable = [
        'unique_id',
        'admin_id',
        'discount_name',
        'discount_type',
        'discount_value',
        'discount_max_value',
        'discount_start_date',
        'discount_end_date',
        'status',
        'products'
    ];
}
