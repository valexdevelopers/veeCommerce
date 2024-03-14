<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    
    protected $table = 'addresses';

        
    /**
     * fillable - attributes that are mass assignable
     *
     * @var array<string, string>
     */
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'street',
        'apartment',
        'town',
        'region',
        'country',
        'postal_code',
        'mobile'

    ];

    public function userAddress(){
        return $this->belongsTo(Models\User::class, 'user_id');
    }
}
