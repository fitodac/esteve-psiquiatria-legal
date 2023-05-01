<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'content_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * return only specific fields
     */
    public function scopePopularFields($query)
    {
        return $query->select('id','type');
    }

    /**
     * Get the Libraries for the blog post.
     */
    public function libraries()
    {
        return $this->hasMany(Library::class);
    }
}
