<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpazillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upazillas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('country')->nullable();
            $table->unsignedInteger('district_id')->nullable();
            $table->float('shipping_cost')->nullable();
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
        Schema::dropIfExists('upazillas');
    }
}
