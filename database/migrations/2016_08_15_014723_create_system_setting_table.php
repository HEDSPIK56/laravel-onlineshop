<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_title')->nullable();
            $table->string('shop_url')->nullable();
            $table->string('shop_email')->nullable();
            $table->string('shop_logo')->nullable();
            $table->string('shop_phone_number')->nullable();
            $table->string('shop_address')->nullable();
            $table->string('shop_facebook')->nullable();
            $table->string('shop_facebook_app_id')->nullable();
            $table->string('shop_twitter')->nullable();
            $table->string('shop_twitter_app_id')->nullable();
            $table->string('shop_google-plus')->nullable();
            $table->string('shop_google-plus_app_id')->nullable();
            $table->string('shop_descripton')->nullable();
            $table->string('shop_author')->nullable();
            $table->string('shop_generator')->nullable();
            $table->string('shop_abstract')->nullable();
            $table->string('shop_keywords')->nullable();
            $table->string('shop_robots')->nullable();
            $table->text('shop_google_analytics_code')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::drop('system_setting');
    }
}
