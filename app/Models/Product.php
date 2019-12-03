<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function trySave()
    {
        try{
            $this->save();
        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
