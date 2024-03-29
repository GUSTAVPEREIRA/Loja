<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'value',
        'id',
        'category_id'
    ];

    protected $table = 'products';

}
