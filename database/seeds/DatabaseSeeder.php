<?php

use Illuminate\Database\Seeder;
use App\Models\
{
    Brand, Category, Product
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Brand::insert(
            [
                [
                    'name' => 'Gucci',
                    'slug' => str_slug('Gucci')
                ],
                [
                    'name' => 'Dolce & Gabbana',
                    'slug' => str_slug('Dolce & Gabbana')
                ],
                [
                    'name' => 'Philip Plein',
                    'slug' => str_slug('Philip Plein')
                ],
                [
                    'name' => 'Louis Vuiton',
                    'slug' => str_slug('Louis Vuiton')
                ],
                [
                    'name' => 'Burberry',
                    'slug' => str_slug('Burberry')
                ],
                [
                    'name' => 'Versace',
                    'slug' => str_slug('Versace')
                ],
                [
                    'name' => 'Saint Laurent',
                    'slug' => str_slug('Saint Laurent')
                ],
                [
                    'name' => 'Hugo Boss',
                    'slug' => str_slug('Hugo Boss')
                ],
                [
                    'name' => 'Calvin Klein',
                    'slug' => str_slug('Calvin Klein')
                ],
                [
                    'name' => 'Hermès',
                    'slug' => str_slug('Hermès')
                ],
                [
                    'name' => 'Christian Dior',
                    'slug' => str_slug('Christian Dior')
                ],
                [
                    'name' => 'Givenchy',
                    'slug' => str_slug('Givenchy')
                ],
                [
                    'name' => 'Supreme',
                    'slug' => str_slug('Supreme')
                ],
                [
                    'name' => 'Michael Kors',
                    'slug' => str_slug('Michael Kors')
                ],
                [
                    'name' => 'Bvlgari',
                    'slug' => str_slug('Bvlgari')
                ],
                [
                    'name' => 'Salvatore Ferragamo',
                    'slug' => str_slug('Salvatore Ferragamo')
                ],
                [
                    'name' => 'Fendi',
                    'slug' => str_slug('Fendi')
                ],
                [
                    'name' => 'Balenciaga',
                    'slug' => str_slug('Balenciaga')
                ]
            ]
        );

        foreach (Brand::all() as $brand) {
            $brand->update(['position' => $brand->id]);
        }


        Category::insert(
            [
                [
                    'name' => 'Áo',
                    'slug' => str_slug('Áo')
                ],
                [
                    'name' => 'Quần',
                    'slug' => str_slug('Quần')
                ],
                [
                    'name' => 'Giày',
                    'slug' => str_slug('Giày')
                ],
                [
                    'name' => 'Túi xách',
                    'slug' => str_slug('Túi xách')
                ],
                [
                    'name' => 'Đồng hồ',
                    'slug' => str_slug('Đồng hồ')
                ],
                [
                    'name' => 'Phụ kiện',
                    'slug' => str_slug('Phụ kiện')
                ]
            ]
        );

        foreach (Category::all() as $category) {
            $category->update(['position' => $category->id]);
        }
    }
}