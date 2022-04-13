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
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('color_name');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('description', 400)->nullable();
            $table->longText('content');
            $table->integer('trademark_id')->unsigned()->references('id')->on('trademarks')->onDelete('cascade');
            $table->tinyInteger('hot')->default(0);
            $table->tinyInteger('new')->default(0);
            $table->timestamps();
        });

        
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned()->references('id')->on('products')->onDelete('cascade');
            $table->integer('color_id')->unsigned()->references('id')->on('colors')->onDelete('cascade');
            $table->decimal('price')->nullable();
            $table->decimal('promotion')->nullable();
            $table->string('thumbnail', 400)->nullable();
            $table->string('images', 400)->nullable();
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
        Schema::dropIfExists('product_details');
        Schema::dropIfExists('products');
        Schema::dropIfExists('colors');
    }
};
