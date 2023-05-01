<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Module extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'title',
        'description',
        'teacher',
        'tag',
        'video',
        'active',
        'parent_module_id',
        'order',
    ];

    // protected $appends = ['can_access'];

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

    public function isFirstModule()
    {
        return $this->order === 1;
    }

    public static function nextOrder($course_id)
    {
        $lastModule = static::where('course_id', $course_id)->orderBy('order', 'desc')->first();
        return $lastModule ? $lastModule->order + 1 : 1;
    }

    public static function nextModule($currentModuleId)
    {
        $currentModule = Module::find($currentModuleId);
        $nextModule = Module::select('id')
            ->where('course_id', $currentModule->course_id)
            ->where('order', '>', $currentModule->order)
            ->where('active', true)
            ->orderBy('order')
            ->first();
        return $nextModule ?? null;
    }

    public static function isLastModule($currentModuleId)
    {
        $currentModule = Module::find($currentModuleId);
        $max = Module::where('course_id', $currentModule->course_id)->where('active', true)->max('order');
        return $currentModule->order == $max;
    }

    public function isApprovedByUser(User $user)
    {
        return $this->users()
            ->wherePivot('user_id', $user->id)
            ->wherePivot('approved', true)
            ->exists();
    }

    public function course(): BelongsTo {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the questions for the module.
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class)->where('active', true);
    }

    public function parent()
    {
        return $this->belongsTo(Module::class, 'parent_module_id');
    }

    public function children()
    {
        return $this->hasMany(Module::class, 'parent_module_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'module_user')->withPivot('approved')->withTimestamps();
    }
}
