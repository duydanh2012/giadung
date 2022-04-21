<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20);
            $table->string('name', 100)->nullable();
            $table->string('address', 400)->nullable();
            $table->string('email'. 255)->nullable();
            $table->string('paymentMethod', 255)->default('postpaid');
            $table->string('total', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->integer('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('bills');
    }
};
