<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    //protected $dateFormat = 'U';

    public function getDateTimeFormat($style = 'Y M d', $attribute = 'created_at')
    {
        if(!is_null($style)){
            return $attribute->format($style);
        }
    }
}
