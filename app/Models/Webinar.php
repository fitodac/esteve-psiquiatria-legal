<?php

namespace App\Models;

use App\Casts\Time;
use DateTimeInterface;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'speaker',
        'schedule',
        'image',
        'appointment_day',
        'appointment_hour',
        'registration_form',
    ];

    protected $casts = [
        'appointment_hour' => Time::class
    ];

    public function scopeActive($query)
    {
        $query->where('active', 1);
    }
}
