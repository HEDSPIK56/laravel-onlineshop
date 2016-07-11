<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('type')->default(0);
            $table->string('standard_info');
            $table->enum('visible', ['Y', 'N'])->default('Y');
            $table->enum('use_breadcrumb', ['Y', 'N'])->default('Y');
            $table->enum('use_search', ['Y', 'N'])->default('Y');
            $table->integer('view_type')->default(0); // 0: grid view || 1: listview
            $table->integer('align_type')->default(0); // 0: center || 1: Right | 2: Left
            $table->string('item_per_page')->default('4/3/2');
            $table->string('item_per_line')->default('8/6/4');
            $table->boolean('load_more')->default(false);
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
        Schema::drop('categories');
    }

}
