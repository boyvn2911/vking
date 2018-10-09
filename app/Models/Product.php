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

    public function handleStore($rq)
    {
        $this->name = $rq->name;
        $this->slug = str_slug($rq->name);
        $this->image = $this->handleUploadImage( $rq->image );
        $this->price_org = $rq->price_org;
        $this->price_vking = $rq->price_vking;
        $this->price_sale = $rq->price_sale;
        $this->size = $rq->size;
        $this->description = $rq->description;
        $this->hot = $rq->hot;
        $this->save();
        return $this;
    }

    public function handleDelete()
    {
        $this->delete();
    }

    public function handleUploadImage($image)
    {

        return;
    }
}
