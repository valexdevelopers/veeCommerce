<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class StoreBanner extends Model
{
    use HasFactory;
    protected $table = 'banners';

    protected $fillable = [
        'admin_id',
        'banner_1',
        'banner_2',
        'banner_3',
        'side_banner_1',
        'side_banner_2',
    ];


    public function bannerSetBy(){
        return $this->belongsTo(Models\Admin::class, 'admin_id');
    }
}
