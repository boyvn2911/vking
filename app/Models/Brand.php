<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    public function product()
    {
        return $this->belongsTo('App/Models/Brand');
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
