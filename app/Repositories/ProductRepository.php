<?php

namespace App\Repositories;

use App\Models\ {
    Product
};

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

}