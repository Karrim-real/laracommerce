<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'address_id',
        'user_id',
        'prod_id',
        'prod_qty',
        'message',
        'tracking_id',
        'payment_ref',
        'total_price'
    ];
    public function addresses()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }
}
