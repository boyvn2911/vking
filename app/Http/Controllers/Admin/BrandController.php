<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
    protected $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        return $this->brand->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return
     */
    public function store(Request $rq)
    {
        $brand = $this->brand;
        return $brand->handleStore($rq);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->brand->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return
     */
    public function edit($id)
    {
        $brand = $this->brand->find($id);
        return view('admin.brand.edit', compact('brand') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return
     */
    public function update($id, Request $rq)
    {
        $brand = $this->brand->find($id);
        return $brand->handleStore($rq);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return
     */
    public function destroy($id)
    {
        $brand = $this->brand->find($id);
        return $brand->handleDelete();
    }
}
