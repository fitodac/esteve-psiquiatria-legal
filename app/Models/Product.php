<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'family_id',
        'name',
        'image',
        'image_width',
        'type',
        'description',
        'caution',
        'slug',
        'category_slug',
        'natural'
    ];

    /**
     * return only specific fields
     */
    public function scopePopularFields($query)
    {
        return $query->select('id','name');
    }

    public function libraries()
    {
        return $this->belongsToMany(
            Product::class,
            'libraries_products',
            'product_id',
            'library_id');
    }

    public function families()
    {
        return $this->belongsTo(Family::class);
    }
}
