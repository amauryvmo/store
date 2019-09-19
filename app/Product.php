<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const TYPE_BUNDLE = 'bundle';
    const TYPE_SIMPLE = 'simple';

    protected $fillable = [
        'type', 'sku', 'name', 'short_description', 'description', 'price', 'image', 'active', 'show_only'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
