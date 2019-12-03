<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use App\Models\{
    Brand, Category
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Brand $brand, Category $category)
    {
        Schema::defaultStringLength(191);

        $brands = $brand->all();
        $categories = $category->all();

        view()->share(compact('brands','categories'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}