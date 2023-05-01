<?php

namespace App\Models;

use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'subtitle',
        'format_id',
        'long_description',
        'image',
        'score',
        'title',
        'short_description',
        'teacher',
        'category_id',
        'video',
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

    /**
     * Get the modules for the courses.
     */
    public function modules(): HasMany
    {
        return $this->hasMany(Module::class)->where('active', true);
    }

    public function format(): BelongsTo {
        return $this->belongsTo(Format::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function isApprovedByUser(User $user)
    {
        $approvedModulesCount = $this->modules()
            ->whereHas('users', function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->where('approved', true);
            })
            ->count();

        return $approvedModulesCount == $this->modules->count();
    }
}
