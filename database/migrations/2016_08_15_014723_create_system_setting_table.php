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
            $table->string('shop_title')->default('online shop');
            $table->string('shop_url')->default('www.cuahangbachhoa247.com');
            $table->string('shop_email')->default('support@cuahangbachhoa247.com');
            $table->string('shop_logo')->nullable();
            $table->string('shop_phone_number')->default('+841676460626');
            $table->string('shop_address')->default('home');
            $table->string('shop_facebook')->default('www.facebook.com');
            $table->string('shop_facebook_app_id')->default('1212597675425450');
            $table->string('shop_twitter')->default('home');
            $table->string('shop_twitter_app_id')->default('1212597675425450');
            $table->string('shop_google-plus')->default('www.google.com.vn');
            $table->string('shop_google-plus_app_id')->default('1212597675425450');
            $table->string('shop_descripton')->default('www.google.com.vn');
            $table->string('shop_author')->default('www.google.com.vn');
            $table->string('shop_generator')->default('www.google.com.vn');
            $table->string('shop_abstract')->default('www.google.com.vn');
            $table->string('shop_keywords')->default('www.google.com.vn');
            $table->string('shop_robots')->default('www.google.com.vn');
            $table->text('shop_google_analytics_code')->default('www.google.com.vn');
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
