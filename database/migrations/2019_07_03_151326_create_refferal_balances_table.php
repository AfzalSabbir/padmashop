<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefferalBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refferal_balances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('d_code');
            $table->unsignedInteger('customer_id');
            $table->float('sold',8,2);
            $table->float('commission',8,2);
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
        Schema::dropIfExists('refferal_balances');
    }
}
