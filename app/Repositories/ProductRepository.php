<?php

namespace App\Repositories;

use App\Helpers\UploadImage;
use App\Models\ {
    Product
};
use Storage;

class ProductRepository
{
    /**
     * The Product instance.
     *
     * @var \App\Models\Product
     */
    protected $product;

    /**
     * Create a new ProductRepository instance.
     *
     * @param  \App\Models\Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function filterBrand($id, $nbr)
    {
        return $this->product = $this->product->where('brand_id', $id)->paginate($nbr);
    }

    public function filterActive()
    {
        $this->product = $this->product->where('active', true);
        return $this;
    }

    public function show($id)
    {
        return $this->product->findOrFail($id);
    }

    public function getProductsOrderedbyPosition($nbr, $direction)
    {
        return $this->product->with(['brand', 'category'])->where('active',1)->orderBy('position', $direction)->paginate($nbr);
    }

    public function getProductsOrderedbyUpdated($nbr)
    {
        return $this->product->with(['brand', 'category'])->orderBy('updated_at', 'desc')->paginate($nbr);
    }

    public function getProductsWithBrand($id, $nbr)
    {
        return $this->product->with(['brand', 'category'])->where('brand_id', $id)->orderBy('updated_at', 'desc')->paginate($nbr);
    }

    public function getProductsWithCategory($id, $nbr)
    {
        return $this->product->with(['brand', 'category'])->where('category_id', $id)->orderBy('updated_at', 'desc')->paginate($nbr);
    }

    public function getNewProducts($nbr)
    {
        return $this->product->orderBy('updated_at', 'desc')->paginate($nbr);
    }

    public function getHotProducts($nbr)
    {
        return $this->product->where('hot', 1)->orderBy('updated_at', 'desc')->paginate($nbr);
    }

    public function getSaleProducts($nbr)
    {
        return $this->product->where('price_sale','>',1)->orderBy('updated_at', 'desc')->paginate($nbr);
    }

    public function getRelatedProducts($id, $brand_id, $nbr)
    {
        return $this->product->with(['brand', 'category'])->where('brand_id', $brand_id)->where('id', '<>', $id)->inRandomOrder()->take($nbr)->get();
    }

    public function handleStore($request, $id = null)
    {
        if ($id) {
            $this->product = $this->product->findOrFail($id);
        }
        $this->product->name = $request->name;
        $this->product->slug = str_slug($request->name);
        $this->product->price_org = $request->price_org;
        $this->product->price_vking = $request->price_vking;
        $this->product->price_sale = $request->price_sale;
        $this->product->hot = $request->hot;
        $this->product->description = $request->description;
        $this->product->category_id = $request->category_id;
        $this->product->brand_id = $request->brand_id;
        $this->product->size = serialize($request->size);
        $this->product->image = $this->handleUploadImage($request->file('image'));
        $this->product->trySave();
        $this->product->position = $this->product->id;
        $this->product->trySave();
        return $this->product;
    }

    public function destroy($id)
    {
        $this->product = $this->product->findOrFail($id);
        $arr = @unserialize($this->product->image);

        if ($arr) {
            foreach ($arr as $image) {
                $this->deleteImageAndThumbnail($image);
            }
        }
        return $this->product->delete();
    }

    public function destroyImage($id, $key)
    {
        $product = $this->show($id);
        $arr = unserialize($product->image);
        $this->deleteImageAndThumbnail($arr[$key]);
        unset($arr[$key]);
        $arr = array_merge($arr);
        $product->image = serialize($arr);
        $product->trySave();
        return $product;
    }


    public function updateStatus($id)
    {
        $product = $this->product->findOrFail($id);
        $product->active = !$product->active;
        $product->trySave();
        return $product;
    }

    public function makeAva($id, $key)
    {
        return $this->swapPositionWithFirst($id, $key);
    }

    protected function handleUploadImage($files)
    {
        $arr = $this->getArrayImage();

        if ($files) {
            foreach ($files as $file) {
                if ($file->isValid()) {
                    $image = new UploadImage($file, $watermark = resource_path('assets/image/logo-small.png'));
                    $arr[] = $image->handleUploadAndResize(500);
                } else {
                    return back()->with('error', 'File không hợp lệ');
                }
            }
        }
        return serialize($arr);
    }

    protected function deleteImageAndThumbnail($image)
    {
        Storage::delete(['upload/' . $image, 'upload/resized-' . $image]);
    }

    protected function getArrayImage()
    {
        return unserialize($this->product->image);
    }

    protected function swapPositionWithFirst($id, $key)
    {
        $product = $this->show($id);
        $arr = unserialize($product->image ?? serialize([]));

        $temp = $arr[0];
        $arr[0] = $arr[$key];
        $arr[$key] = $temp;

        $product->image = serialize($arr);
        $product->trySave();
        return $product;
    }

    public function search($string, $nbr)
    {
        $string = explode(' ', $string);
        $string = implode('%', $string);
        $string = '%' . $string . '%';

        return $this->product->where('name', 'like', $string)->orderBy('id', 'desc')->paginate($nbr);
    }
}