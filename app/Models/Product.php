<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cat_id',
        'small_desc',
        'selling_price',
        'discount_price',
        'prod_desc',
        'status',
        'prod_keywords',
        'image'
    ];
    public function categorys()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
}
