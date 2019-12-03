<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CateRepository;

class AjaxController extends Controller
{
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

    public function show($id)
    {
        return $this->repository->show($id);
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
