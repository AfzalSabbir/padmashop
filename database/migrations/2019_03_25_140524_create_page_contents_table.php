<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_bn')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();
            $table->text('image')->nullable();
            $table->string('route')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
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
        Schema::dropIfExists('page_contents');
    }
}
