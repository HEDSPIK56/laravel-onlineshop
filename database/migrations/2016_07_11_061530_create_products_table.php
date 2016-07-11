<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('discount_id');
            $table->string('name');
            $table->string('tags');
            $table->string('keywords');
            $table->bigInteger('price');
            $table->bigInteger('market_price');
            $table->boolean('status')->default(true);
            $table->text('desciption');
            $table->integer('use_icon');
            $table->dateTime('use_icon_period_from');
            $table->dateTime('use_icon_period_to');
            $table->text('content');
            $table->text('detail');
            $table->text('images');
            $table->enum('visible', ['Y', 'N'])->default('Y');
            $table->integer('number_view')->default(0);
            $table->integer('number_like')->default(0);
            $table->integer('number_bookmark')->default(0);
            $table->integer('number_share')->default(0);
            $table->integer('number_item')->default(0);
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
        Schema::drop('products');
    }

}
