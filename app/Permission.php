<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
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
    public function hasRole($roleName)
    {
        foreach ($this->roles as $role) {
            if ($role->name == $roleName)
            {
                return true;
            }
        }
    }

}
