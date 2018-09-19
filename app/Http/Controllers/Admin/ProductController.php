<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        return $this->product->get();
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
        $product = $this->product;
        return $product->handleStore($rq);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->product->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return
     */
    public function edit($id)
    {
        $brand = $this->product->find($id);
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
        $product = $this->product->find($id);
        return $product->handleStore($rq);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);
        return $product->handleDelete();
    }
}
