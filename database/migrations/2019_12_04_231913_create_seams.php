<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product');
            $table->double('price');
            $table->string('medidas');
            $table->boolean('status');
            $table->string('count_clothes');
            $table->date('date_in');
            $table->date('date_out');
            $table->string('type');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')
      ->references('id')->on('customers')
      ->onDelete('cascade');
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
        Schema::dropIfExists('seams');
    }
}
