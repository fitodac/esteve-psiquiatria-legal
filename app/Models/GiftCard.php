<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'user_id',
        'amount',
        'delivery_date',
        'expiration'
    ];

    protected $casts = [
        'created_at' => 'date:d/m/Y',
    ];
}
