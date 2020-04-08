<?php

use App\Output;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('state')->default(Output::VENTA_MENOR);
            
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
