<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('address');
            $table->date('date_of_birth');
            $table->enum('sex', ['M', 'F'])->default('M');
            $table->enum('marital_status', ['Y', 'N'])->default('N');
            $table->string('about')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('google_plus_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->date('member_since')->nullable();
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
        Schema::drop('profiles');
    }
}
