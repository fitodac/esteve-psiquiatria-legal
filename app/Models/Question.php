<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'module_id',
        'question',
        'answers',
        'active'
    ];

    /**
     * Scope a query to only include active challenges.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeActive($query)
    {
        $query->where('active', 1);
    }

    public function module(): BelongsTo {
        return $this->belongsTo(Module::class);
    }

    public function getAnswersAttribute($answers)
    {
        $array = json_decode($answers, true);

        foreach ($array as $key => $arr) {
            unset($array[$key]['valid']);
        }

        return json_encode($array);
    }
}
