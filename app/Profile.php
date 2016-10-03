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
    
    public function getAgeAttribute()
    {
        if(!empty($this->attributes['date_of_birth'])){
            return Carbon::parse($this->attributes['date_of_birth'])->age;
        }
        return 0;
    }

    public function getDateOfBirth(){
        if(!empty($this->attributes['date_of_birth'])){
            return $this->attributes['date_of_birth'];
        }
        return Carbon::now();
    }

    public function getSexToStringAttribute()
    {
        if($this->attributes['sex'] == 'F'){
            return "Female";
        }
        return "Male";
    }

    public function getMarialStatusToStringAttribute()
    {
        if($this->attributes['marital_status'] == 'Y'){
            return "Married";
        }
        return "Single";
    }
}
