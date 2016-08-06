<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'phone_number', 'address', 'date_of_birth'
    ];
    
    public function getYearOld()
    {
        if(!empty($this->attributes['date_of_birth'])){
            return 10;
        }
        return 0;
    }
}
