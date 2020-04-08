<?php

use App\Product;
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
            $table->bigIncrements('id');
            $table->bigInteger('id_model_product')->unsigned();
            $table->bigInteger('id_branch')->unsigned();
            
            $table->string('mac');
            $table->string('state')->default(Product::VERIFICANDO);
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
