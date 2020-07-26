<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_balances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('d_code');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('order_id');
            $table->string('percentage');
            $table->unsignedtinyInteger('status')->default(0);
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
        Schema::dropIfExists('referral_balances');
    }
}
