<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];

    /**
     * Query Scope
     */
    public function scopeLike($query, $condition)
    {
        return $query->where('name', 'like', '' . $condition->getKeyWord() . '%');
    }

    /**
     * End Query scope
     */

}
