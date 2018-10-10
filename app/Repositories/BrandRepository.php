<?php

namespace App\Repositories;

use App\Models\ {
    Brand
};

class BrandRepository
{
    /**
     * The Brand instance.
     *
     * @var \App\Models\Brand
     */
    protected $brand;

    /**
     * Create a new BlogRepository instance.
     *
     * @param  \App\Models\Brand $brand
     */
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }



    /**
     *
     *
     * @param 'asc' or 'desc' $direction
     */
    public function queryAllOrderByPosition($direction)
    {
        return $this->brand->orderBy('position', $direction);
    }


    /**Return list of brand with direction
     *
     *
     * @param 'asc' or 'desc' $direction
     */

    public function getAllOrderByPosition($direction)
    {
        return $this->queryAllOrderByPosition($direction)->get();
    }


    /**
     * Save a new brand to database
     *
     * @param BrandRequest $request
     */

    public function store($request)
    {
        $this->brand->slug = str_slug($request->name);
        $this->brand->name = $request->name;
        $this->brand->save();
        $this->brand->position = $this->brand->id;
        $this->brand->save();
        return $this->brand;
    }


    /**Destroy brand
     *
     *
     * @param 'asc' or 'desc' $direction
     */
    public function deleteBrand($id)
    {
        return $this->brand->destroy($id);
    }


    public function updateStatus($id)
    {
        $brand = $this->brand->findOrFail($id);
        $brand->active = !$brand->active;
        $brand->save();
        return $brand;
    }


    public function changeName($id,$request)
    {
        $brand = $this->brand->findOrFail($id);
        $brand->name = $request->name;
        $brand->slug = str_slug($request->name);
        $brand->save();
        return $brand;
    }
}
