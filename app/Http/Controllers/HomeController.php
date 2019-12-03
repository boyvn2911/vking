<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Brand, Category
};
use App\Repositories\{
    ProductRepository
};

class HomeController extends Controller
{
    protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guest.index');
    }

    public function listBrand($slug, $id, Request $request)
    {
        $products = $this->repository->getProductsWithBrand($id, 18);
        if ( $request->ajax() ) {
            return view('guest.partials.list', compact('products'));
        }
        $brand = Brand::find($id);
        return view('guest.pages.list-brand', compact('products', 'brand'));
    }

    public function listCategory($slug, $id, Request $request)
    {
        $products = $this->repository->getProductsWithCategory($id, 18);
        if ($request->ajax()) {
            return view('guest.partials.list', compact('products'));
        }
        $category = Category::find($id);
        return view('guest.pages.list-category', compact('products', 'category'));
    }

    public function detail($slug, $id)
    {
        $product = $this->repository->show($id);

        $size = $this->getStringSizeFromType($product->category->size) ?? [];

        $similars = $this->repository->getRelatedProducts($id, $product->brand_id, 3);

        return view('guest.pages.detail', compact('product', 'size', 'similars'));
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

    public function getNew()
    {
        $products = $this->repository->getNewProducts(18);
        return view('guest.partials.new',compact('products'));
    }

    public function getHot()
    {
        $products = $this->repository->getHotProducts(24);
        return view('guest.partials.hot',compact('products'));
    }

    public function getSale()
    {
        $products = $this->repository->getSaleProducts(18);
        return view('guest.partials.new',compact('products'));
    }

    public function getHotList()
    {
        $title = 'Hot Items';
        $products = $this->repository->getHotProducts(18);
        $a = 'hot';
        return view('guest.pages.list-b', compact('products', 'title','a'));
    }

    public function getNewList()
    {
        $title = 'New Items';
        $products = $this->repository->getNewProducts(18);
        $a = 'new';
        return view('guest.pages.list-b', compact('products', 'title','a'));
    }

    public function getSaleList()
    {
        $title = 'Sale Items';
        $products = $this->repository->getSaleProducts(18);
        $a = 'sale';
        return view('guest.pages.list-b', compact('products', 'title','a'));
    }
}
