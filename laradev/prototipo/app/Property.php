<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'rental_price',
        'sale_price'
    ];
    protected $hidden = ['id'];

    protected $table = 'properties';
}
