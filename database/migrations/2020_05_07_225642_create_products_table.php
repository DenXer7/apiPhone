<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->bigInteger('id_model_product')->unsigned();
            $table->bigInteger('id_branch')->unsigned();
            
            $table->string('mac');
            $table->string('state');
            $table->string('defect');
            $table->integer('price_buy');
            $table->integer('price_sale');
            $table->string('price_sale_min');
            $table->string('price_sale_max');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_model_product')->references('id')->on('model_products');
            $table->foreign('id_branch')->references('id')->on('branches');

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
