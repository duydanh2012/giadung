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
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50);
            $table->string('name', 255);
            $table->string('description', 400)->nullable();
            $table->longText('content');
            $table->tinyInteger('hot')->default(0);
            $table->tinyInteger('new')->default(0);
            $table->decimal('price')->nullable();
            $table->decimal('promotion')->nullable();
            $table->string('thumbnail', 400)->nullable();
            $table->string('images', 400)->nullable();
            $table->tinyInteger('quantity')->default(0);
            $table->integer('color_id')->unsigned()->references('id')->on('colors')->onDelete('cascade');
            $table->integer('trademark_id')->unsigned()->references('id')->on('trademarks')->onDelete('cascade');
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('colors');
    }
};
