<?php

namespace App\Repositories;

use App\Models\ {
    Brand
};

class BrandRepository
{
    /**
     * The Brand instance.
     *
     * @var \App\Models\Brand
     */
    protected $brand;

    /**
     * Create a new BlogRepository instance.
     *
     * @param  \App\Models\Brand $brand
     */
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }
}
