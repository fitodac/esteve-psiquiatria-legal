<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $fillable = [
        'material',
        'category_id',
        'content_type_id',
        'channel_id',
        'link',
        'image'
    ];

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'libraries_products',
            'library_id',
            'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function contenttype()
    {
        return $this->belongsTo(ContentType::class, 'content_type_id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
