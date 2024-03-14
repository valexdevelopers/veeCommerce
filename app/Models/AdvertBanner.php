<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models;

class AdvertBanner extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'advert_banners';

    protected $fillable = [
        'banner_image',
        'admin_id',
        'banner_name',
        'visibility',
    ];

    public function setbyAdmin(){
        return $this->belongsTo(Models\Admin::class, 'admin_id');
    }
}
