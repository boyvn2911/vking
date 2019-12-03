<?php

namespace App\Repositories;

use App\Models\ {
    Category
};

class CateRepository
{
    /**
     * The Category instance.
     *
     * @var \App\Models\Category
     */
    protected $category;

    protected $size;

    /**
     * Create a new BlogRepository instance.
     *
     * @param  \App\Models\Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function show($id)
    {
        return $this->category->findOrFail($id);
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
        $this->category->size = $request->size;
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


    public function changeName($id, $request)
    {
        $category = $this->category->findOrFail($id);
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->size = $request->size;
        $category->save();
        return $category;
    }

    public function hasSize()
    {
        if ($this->category->size != null) return true;
        return false;
    }

    public function getStringSizeFromType($size)
    {
        switch ($size) {
            case 1:
                return [44, 46, 48, 50];
                break;
            case 2:
                return ['XS', 'S', 'M', 'L'];
                break;
            case 3:
                return ['39', '40', '41', '42'];
                break;
            case 4:
                return ['85', '90', '95', '100'];
                break;
            default:
                return ['XS', 'S', 'M', 'L'];
                break;
        }
    }
}