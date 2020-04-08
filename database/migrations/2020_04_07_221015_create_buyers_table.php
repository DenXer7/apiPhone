<?php

use App\Buyer\Buyer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_provider')->unsigned();

            $table->integer('code_buy');
            $table->dateTime('date_time');
            $table->integer('total');
            $table->string('state')->default(Buyer::XPAGAR);
            
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_provider')->references('id')->on('providers');

            
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyers');
    }
}
