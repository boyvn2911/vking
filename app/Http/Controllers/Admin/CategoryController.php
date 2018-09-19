<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        return $this->category->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return
     */
    public function store(Request $rq)
    {
        $category = $this->category;
        return $category->handleStore($rq);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->category->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return
     */
    public function edit($id)
    {
        $category = $this->category->find($id);
        return view('admin.category.edit', compact('category') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return
     */
    public function update($id, Request $rq)
    {
        $category = $this->category->find($id);
        return $category->handleStore($rq);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return
     */
    public function destroy($id)
    {
        $category = $this->category->find($id);
        return $category->handleDelete();
    }
}
