<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Challenge extends Model
{
    const TYPE = ['recommendation' => 'Recomendación', 'visibility' => 'Visibilidad'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'title',
        'description',
        'image',
        'challenge_type',
        'score',
        'date_from',
        'date_to',
        'participation',
        'legal'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_from' => 'date:Y/m/d',
        'date_to' => 'date:Y/m/d',
        'participation' => 'json'
    ];

    /**
     * Scope a query to only include recomendations challenges.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecommendation($query)
    {
        return $query->where('challenge_type', 'recommendation');
    }

    /**
     * Scope a query to only include visibility challenges.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVisibility($query)
    {
        return $query->where('challenge_type', 'visibility');
    }

    /**
     * Scope a query to only include active challenges.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeActive($query)
    {
        $query->where('active', 1)
            ->whereRaw('(CAST( now() AS Date ) between date_from and date_to)');
    }

    /**
     * Get all of the scores for the Challenge
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scores(): HasMany
    {
        return $this->hasMany(Score::class);
    }
}
