<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const TYPE_BUNDLE = 'bundle';
    const TYPE_SIMPLE = 'simple';
}
