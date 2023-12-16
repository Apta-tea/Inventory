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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('issued_no')->nullable();
            $table->integer('company_id')->unsigned();
            $table->date('issued_date')->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('description')->nullable();
            $table->string('internal_notes')->nullable();
            $table->double('amount',10,2)->nullable();
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
        Schema::dropIfExists('materials');
    }
};
