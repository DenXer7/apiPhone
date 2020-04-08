<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OutputProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('output_product', function (Blueprint $table) {
            $table->bigInteger('id_output')->unsigned();
            $table->bigInteger('id_product')->unsigned();

            $table->foreign('id_output')->references('id')->on('outputs');
            $table->foreign('id_product')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('output_product');
    }
}
