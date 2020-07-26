<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('alt_mobile');
            $table->unsignedInteger('district_id');
            $table->unsignedInteger('upazilla_id');
            $table->string('address');
            $table->float('total_quantity');
            $table->float('total_price');
            $table->unsignedInteger('payment_gateway_id')->nullable();
            $table->string('txnid')->nullable()->comment('transaction_id');
            $table->unsignedtinyInteger('is_paid');
            $table->unsignedtinyInteger('order_status')->default(0)->comment('0 - processing | 1 - in godown | 2 - on the way | 3 - delivered');
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
        Schema::dropIfExists('orders');
    }
}
