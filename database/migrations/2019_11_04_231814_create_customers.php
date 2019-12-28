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
            $table->string('name');
            $table->enum('type', ['admin', 'client'])->nullable();
            $table->string('phone')->nullable();
            $table->string('tel')->nullable();
            $table->string('cpf')->unique()->nullable();
            $table->string('street')->nullable();
            $table->integer('number')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->softDeletes();
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
