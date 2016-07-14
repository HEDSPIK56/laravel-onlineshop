<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;
use App\Role;

/**
 * Description of AdminRoleRepository
 *
 * @author nthanh
 */
class AdminRoleRepository
{

    /**
     * - Get list role
     * - Search role by condition
     * - Sort role by condition
     * @param AdminRoleSearchCondition $condition
     * @return string
     */
    public function getListRole($condition)
    {
        return Role::orderBy('created_at', $condition->getSortType())->paginate($condition->getLimit());
    }

    public function createRole($data = array())
    {
        $role = new Role();
        $role->fill($data);
        if ($role->save())
        {
            return true;
        }
        return false;
    }

    public function updateRole($data, $id)
    {
        $role = Role::findOrFail($id);
        if (!$role)
        {
            return false;
        }
        $role->fill($data);
        return $role->save();
    }

    public function readRole($id)
    {
        return Role::findOrFail($id);
    }

    public function deleteRole($id)
    {
        return true;
    }

    /**
     * 
     * @param AdminRoleSearchCondition $condition
     * @return boolean
     */
    public function checkRoleInSystem($condition)
    {
        $role = Role::where('name', $condition->getName())->firstOrFail();
        if (!$role)
        {
            return false;
        }
        return true;
    }

}
