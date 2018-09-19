<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function product()
    {
        return $this->belongsTo('App/Models/Product');
    }

    public function handleStore($rq)
    {
        $this->name = $rq->name;
        $this->slug = str_slug($rq->name);
        $this->save();
        return $this;
    }

    public function handleDelete()
    {
        $this->delete();
    }
}
