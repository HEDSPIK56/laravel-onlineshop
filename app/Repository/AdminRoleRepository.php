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
    public function getListRole($condition = null)
    {
        return Role::like($condition)->orderBy('created_at', $condition->getSortType())->paginate($condition->getLimit());
    }
    
    public function getListRoleNoCondition()
    {
        return Role::all();
    }

        /**
     * @todo Get list ids permisson is apply with role
     * @author NTHanh
     * @param type $roleId
     */
    public function getIdsRolePermisson($roleId)
    {
        $role = $this->readRole($roleId);
        if($role){
            return $role->lists('id')->toArray();
        }
        return array();
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
