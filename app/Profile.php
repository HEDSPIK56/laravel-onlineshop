<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name', 
        'phone_number', 
        'address', 
        'date_of_birth',
        'sex',
        'marital_status',
        'about',
        'facebook_link',
        'google_plus_link',
        'twitter_link',
        'member_since'
    ];

    public function getFullName(){
        return $this->attributes['last_name'] . " " . $this->attributes['first_name'];
    }
    
    public function getYearOld()
    {
        if(!empty($this->attributes['date_of_birth'])){
            return 10;
        }
        return 0;
    }

    public function getDateOfBirth(){
        if(!empty($this->attributes['date_of_birth'])){
            $this->attributes['date_of_birth'];
        }
        return Carbon::now();
    }
}
