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
        Schema::create('bill_details', function (Blueprint $table) {
            $table->id();
            $table->integer('bill_id')->unsigned()->references('id')->on('bills')->onDelete('cascade');
            $table->integer('product_id')->unsigned()->references('id')->on('products')->onDelete('cascade');
            $table->string('number')->nullable();
            $table->string('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_details');
    }
};
