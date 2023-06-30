<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned();
            $table->string('price_below')->nullable();
            $table->string('price_from_to')->nullable();
            $table->string('price_above_from_to')->nullable();
            $table->string('by_wholesale')->nullable();
            $table->enum('weight', ['kilogram', 'ton'])->default('kilogram');
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
        Schema::dropIfExists('prices');
    }
}
