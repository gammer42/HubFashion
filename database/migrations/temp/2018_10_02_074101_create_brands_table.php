<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::create('categories_brands', function (Blueprint $table) {
            $table->integer('categories_id')->unsigned();
            $table->integer('brands_id')->unsigned();

            $table->foreign('categories_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('brands_id')->references('id')->on('brands')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['categories_id', 'brands_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
        Schema::dropIfExists('categories_brands');
    }
}
