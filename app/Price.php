<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * @var string
     */
    protected $table = 'prices';

    /**
     * @var array
     */
    protected $fillable = ['name', 'measure', 'price', 'number'];
}
