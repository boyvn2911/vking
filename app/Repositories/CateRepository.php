<?php

namespace App\Repositories;

use App\Models\ {
    Category
};

class CategoryRepository
{
    /**
     * The Category instance.
     *
     * @var \App\Models\Category
     */
    protected $category;

    /**
     * Create a new BlogRepository instance.
     *
     * @param  \App\Models\Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**Query list of category with direction
     *
     *
     * @param 'asc' or 'desc' $direction
     */
    public function queryAllOrderByPosition($direction)
    {
        return $this->category->orderBy('position', $direction);
    }


    /**Return list of category with direction
     *
     *
     * @param 'asc' or 'desc' $direction
     */
    public function getAllOrderByPosition($direction)
    {
        return $this->queryAllOrderByPosition($direction)->get();
    }



    /**
     * Save a new category to database
     *
     * @param CategoryRequest $request
     */

    public function store($request)
    {
        $this->category->slug = str_slug($request->name);
        $this->category->name = $request->name;
        $this->category->save();
        $this->category->position = $this->category->id;
        $this->category->save();
        return $this->category;
    }


    /**Destroy category
     *
     *
     * @param 'asc' or 'desc' $direction
     */
    public function deleteCategory($id)
    {
        return $this->category->destroy($id);
    }


    public function updateStatus($id)
    {
        $category = $this->category->findOrFail($id);
        $category->active = !$category->active;
        $category->save();
        return $category;
    }


    public function changeName($id,$request)
    {
        $category = $this->category->findOrFail($id);
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();
        return $category;
    }
}