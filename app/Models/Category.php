<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
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
        return $query->select('id', 'name', 'color');
    }


    /**
     * Get the Libraries for the blog post.
     */
    public function libraries()
    {
        return $this->hasMany(Library::class);
    }
}
