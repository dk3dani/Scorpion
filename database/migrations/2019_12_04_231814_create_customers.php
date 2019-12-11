<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['admin', 'client'])->nullable();
            $table->integer('cpf')->unique()->nullable();
            $table->integer('phone')->nullable();
            $table->integer('tel')->nullable();
            $table->softDeletes();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
      ->references('id')->on('users')
      ->onDelete('cascade');

            $table->unsignedBigInteger('addres_id');
            $table->foreign('addres_id')
      ->references('id')->on('address')
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
        Schema::dropIfExists('customers');
    }
}
