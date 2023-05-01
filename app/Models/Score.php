<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasOne;

class Score extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'score',
        'accumulated',
        'valid_until'
    ];

    /**
     * Get the user that owns the Score
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): hasOne
    {
        return $this->hasOne(User::class);
    }
}
