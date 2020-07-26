<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('code', 10);
            $table->unsignedtinyInteger('category');
            $table->unsignedInteger('taka', 10);
            $table->float('discount')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->unsignedtinyInteger('coupon_is_used')->default(0);
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
        Schema::dropIfExists('coupons');
    }
}
