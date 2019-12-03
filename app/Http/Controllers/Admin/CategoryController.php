<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CateRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * The BrandRepository instance.
     *
     * @var \App\Repositories\CategoryRepository
     */
    protected $repository;

    /**
     * Create a new CategoryController instance.
     *
     * @param  \App\Repositories\CategoryRepository $repository
     */
    public function __construct(CateRepository $repository)
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
        $categories = $this->repository->getAllOrderByPosition('asc');
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->repository->store($request);

        return back()->with('success', __('Category has been successfully created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->show($id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $this->repository->find($id)->update($request->all());

        return redirect(route('admin.category'))->with('success', __('Cập nhật thành công'));
    }

    /**
     * Destroy a category if it has no product
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->repository->deleteCategory($id);
        } catch (\Exception $e) {
            return back()->with('error', $e->getCode() === '23000' ? __('Không thể xóa phân loại còn sản phẩm') : $e->getMessage());
        }
        return back()->with('success', __('Xóa thành công'));
    }

    public function updateStatus($id)
    {
        try {
            $result = $this->repository->updateStatus($id);
        } catch (ModelNotFoundException $e) {
            return back()->with('error', $e->getMessage());
        }
        return back()->with('success', 'Trạng thái của ' . $result->name . ' đã thay đổi');
    }

    public function changeName($id, Request $request)
    {
        try {
            $this->repository->changeName($id, $request);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return back()->with('success', __('Đổi tên phân loại thành công'));
    }

    public function size(Request $request)
    {
        $size = $this->show($request->id)->size;
        if(is_array(@unserialize($request->size))) {
            $current_sizes = @unserialize($request->size);
        }else{
            $current_sizes = [];
        }
        $sizes = $this->getStringSizeFromType($size);

        return view('admin.products.size', compact('sizes','current_sizes'));
    }

    protected function getStringSizeFromType($size)
    {
        switch ($size) {
            case 1:
                return ['44', '46', '48', '50'];
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
                return null;
                break;
        }
    }
}