<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;
use App\Role;
use App\Condition\AdminRoleCondition;

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

    public function createRole($data = array(), $permisson_data)
    {
        $role = new Role();
        $role->fill($data);
        if ($role->save())
        {
            $role->perms()->sync($permisson_data);
            return true;
        }
        return false;
    }

    public function attachPermissonToRole($role, $role_ids = array())
    {
        return $role->perms()->sync($role_ids);
    }

    /**
     * 
     * @param AdminRoleCondition $roleCondtion
     * @return type
     */
    public function updateRole($roleCondtion)
    {
        $role = Role::findOrFail($roleCondtion->getId());
        if($role){
            $role->fill((array)$roleCondtion);
            $result = $role->save();
            if($result){
                $this->attachPermissonToRole($role, $roleCondtion->getPermissionIds());
                return true;
            }
        }
        return false;
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
