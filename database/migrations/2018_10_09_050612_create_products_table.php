<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('price_vking');
            $table->integer('price_org')->nullable();
            $table->integer('price_sale')->nullable();
            $table->tinyInteger('hot')->nullable();
            $table->string('image');
            $table->string('size')->nullable();
            $table->text('description');
            $table->string('position')->nullable();
            $table->boolean('active')->default(true);
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('restrict');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');

        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
            $table->dropForeign('products_brand_id_foreign');
        });
    }
}
