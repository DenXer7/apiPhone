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
            $table->bigInteger('buyer_id')->unsigned()->nullable();
            $table->bigInteger('modelProduct_id')->unsigned()->nullable();
            $table->bigInteger('branch_id')->unsigned()->nullable();

            $table->string('mac')->nullable();;
            $table->string('state')->default(Product::VERIFICANDO);
            $table->boolean('detail')->nullable();;
            $table->integer('price_buy')->nullable();;
            $table->integer('price_sale')->nullable();;
            $table->string('price_sale_min')->nullable();;
            $table->string('price_sale_max')->nullable();;

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('buyer_id')->references('id')->on('buyers');
            $table->foreign('modelProduct_id')->references('id')->on('model_products');
            $table->foreign('branch_id')->references('id')->on('branches');

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
