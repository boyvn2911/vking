<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function brand()
    {
        return $this->hasMany('App/Models/Brand');
    }

    public function category()
    {
        return $this->hasMany('App/Models/Category');
    }
}
