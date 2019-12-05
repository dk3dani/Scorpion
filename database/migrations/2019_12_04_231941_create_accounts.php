<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('amount', 8, 2);
            $table->double('openBalance', 8, 2);
            $table->double('balance', 8, 2);
            $table->string('bankname');
            $table->integer('number');

            $table->unsignedBigInteger('seam_id');
            $table->foreign('seam_id')
      ->references('id')->on('seams')
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
        Schema::dropIfExists('accounts');
    }
}
