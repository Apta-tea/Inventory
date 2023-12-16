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
        Schema::create('item_materials', function (Blueprint $table) {
            $table->id();
            $table->integer('issued_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->double('item_price',10,2)->nullable();
            $table->double('item_quantity',10,2)->nullable();
            $table->double('item_total',10,2)->nullable();
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
        Schema::dropIfExists('item_materials');
    }
};
