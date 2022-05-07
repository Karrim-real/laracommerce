<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'company',
        'country',
        'street',
        'state',
        'local',
        'city',
        'phone',
        'email',
        'user_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
