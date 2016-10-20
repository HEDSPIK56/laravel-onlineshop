<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->tinyInteger('discount_by_period')->default(0);
            $table->tinyInteger('discount_by_quantity')->default(0);
            $table->integer('min_quantity')->default(5);
            $table->enum('price_type', ['Price', 'Percentage']);
            $table->timestamp('period_from')->nullable();
            $table->timestamp('period_to')->nullable();
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
        Schema::drop('discounts');
    }
}
