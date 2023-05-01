<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $fillable = [
        'name',
        'nif',
        'code'
    ];

    /**
     * Get the users for the pharmacy.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
