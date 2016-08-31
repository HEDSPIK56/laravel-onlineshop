<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $table = "system_setting";
    
    protected $fillable = [
        'shop_title',
        'shop_url',
        'shop_email',
        'shop_logo',
        'shop_phone_number',
        'shop_address',
        'shop_facebook',
        'shop_facebook_app_id',
        'shop_twitter_app_id',
        'shop_google-plus',
        'shop_google-plus_app_id',
        'shop_descripton',
        'shop_author',
        'shop_generator',
        'shop_abstract',
        'shop_keywords',
        'shop_google_analytics_code'
    ];
}
