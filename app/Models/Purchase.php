<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;


class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';
    protected $fillable = [
      'unique_id',
      'user_id',
      'order_id',
      'reference',
      'receipt_number',
      'status',
      'order_details',
      'authorization',
      'customer',
      'requested_amount',
      'paidamount',
      'transaction_date',
      'paidAt',
      'gatewayfees',
      'channel',
      'currency',
      'gateway_response',
   ];
}
