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
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('categories');
            $table->integer('br_id')->unsigned();
            $table->foreign('br_id')->references('id')->on('brands');
            $table->string('pro_name');
            $table->string('pro_slug');
            $table->string('pro_ideal');
            $table->string('pro_fabric');
            $table->string('pro_color');
            $table->string('pro_old_price');
            $table->string('pro_new_price');
            $table->string('description');
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
