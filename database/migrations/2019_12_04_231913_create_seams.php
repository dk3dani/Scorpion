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
            $table->string('product')->nullable();
            $table->double('price')->nullable();
            $table->string('medidas')->nullable();
            $table->boolean('status')->nullable();
            $table->string('count_clothes')->nullable();
            $table->date('date_in')->nullable();
            $table->date('date_out')->nullable();
            $table->string('type')->nullable();
            $table->softDeletes();


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
