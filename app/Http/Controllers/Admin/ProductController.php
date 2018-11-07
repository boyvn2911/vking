<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\{
    ProductRepository, CategoryRepository, BrandRepository
};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * The BrandRepository instance.
     *
     * @var \App\Repositories\BrandRepository
     */
    protected $repository;

    /**
     * Create a new ProductController instance.
     *
     * @param  \App\Repositories\ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repository->getProductsOrderedbyPosition(10, 'desc');
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BrandRepository $brandRepository, CategoryRepository $categoryRepository)
    {
        $brands = $brandRepository->getAllOrderByPosition('asc');
        $categories = $categoryRepository->getAllOrderByPosition('asc');
        return view('admin.products.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->handleStore($request);
        return redirect('admin/product')->with('success', __('Thêm sản phẩm thành công'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->repository->show($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandRepository $brandRepository, CategoryRepository $categoryRepository, $id)
    {
        $brands = $brandRepository->getAllOrderByPosition('asc');
        $categories = $categoryRepository->getAllOrderByPosition('asc');
        $product = $this->repository->show($id);
        return view('admin.products.create', compact('product','brands','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->repository->handleStore($request, $id);
        return back()->with('success', __('Cập nhật sản phẩm thành công'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);
        return back()->with('success', __('Xóa sản phẩm thành công'));
    }

    /**
     * Change status of a brand
     *
     * @param  $id
     */
    public function updateStatus($id)
    {
        try {
            $result = $this->repository->updateStatus($id);
        } catch (ModelNotFoundException $e) {
            return back()->with('error', $e->getMessage());
        }
        return back()->with('success', 'Trạng thái của ' . $result->name . ' đã thay đổi');
    }

    public function deleteImage($id, $key)
    {
        $this->repository->destroyImage($id, $key);
        return back()->with('success', 'Xóa ảnh thành công');
    }

    public function makeAva($id, $key)
    {
        $this->repository->makeAva($id, $key);
        return back()->with('success','Đổi ảnh đại diện thành công');
    }
}
