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
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('sub_category_id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('size_id');
            $table->unsignedInteger('color_id');
            $table->unsignedInteger('unit_id');
            $table->float('purchase_price');
            $table->float('regular_price');
            $table->float('sale_price');
            $table->text('description');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('hit_count')->default(0);
            $table->unsignedInteger('total_sale')->default(0);
            $table->float('discount')->nullable();
            $table->float('discount_time')->nullable();
            $table->string('status')->default(1);
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
    }
}
