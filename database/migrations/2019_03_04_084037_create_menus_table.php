<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu');
            $table->string('menu_bn');
            $table->unsignedInteger('parent_id');
            $table->unsignedInteger('menu_position')->nullable()->comment('0 - Left | 1 - Top | 2 - Dropdown');
            $table->string('icon')->nullable();
            $table->string('url')->nullable();
            $table->string('route')->nullable();
            $table->unsignedInteger('order');
            $table->unsignedtinyInteger('status')->default(1);
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
        Schema::dropIfExists('menus');
    }
}
