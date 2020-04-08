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
            $table->bigIncrements('id_model_product');
            $table->bigIncrements('id_branch');
            
            $table->string('mac');
            $table->string('state');
            $table->string('defect');
            $table->integer('price_buy');
            $table->integer('price_sale');
            $table->string('price_sale_min');
            $table->string('price_sale_max');



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
