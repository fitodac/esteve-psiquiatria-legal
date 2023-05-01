<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Participation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'challenge_id',
        'pharmacy_id',
        'earned_points',
        'formdata',
        'file',
        'approved'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'date:d/m/Y',
    ];

    /**
     * Scope a query to only include active challenges.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeApproved($query) {
        $query->where('approved', 1);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function challenge(): BelongsTo {
        return $this->belongsTo(Challenge::class);
    }

    public function pharmacy(): BelongsTo {
        return $this->belongsTo(Pharmacy::class);
    }
}
