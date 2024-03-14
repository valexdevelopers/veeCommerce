<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class Logo extends Model
{
    use HasFactory;
    protected $table = 'logos';

    protected $fillable = [
        'admin_id',
        'logo',
        'logowhite',
    ];


    public function logoSetBy(){
        return $this->belongsTo(Models\Admin::class, 'admin_id');
    }
}
