<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_client')->unsigned();

            $table->integer('total');
            $table->dateTime('date');
            $table->string('description');
            $table->string('output_type');
            $table->string('state');
            
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_client')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outputs');
    }
}
