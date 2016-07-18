<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;
use App\Permission;

/**
 * Description of AdminPermissionRepository
 *
 * @author NTHanh
 */
class AdminPermissionRepository
{
    public function getListPermission($condition)
    {
        return Permission::like($condition)->orderBy('created_at', $condition->getSortType())->paginate($condition->getLimit());
    }

    public function createPermisson($data = array())
    {
        $permisson = new Permission();
        $permisson->fill($data);
        if ($permisson->save())
        {
            return true;
        }
        return false;
    }

    public function updatePermisson($data, $id)
    {
        $permisson = Permission::findOrFail($id);
        if (!$permisson)
        {
            return false;
        }
        $permisson->fill($data);
        return $permisson->save();
    }

    public function readPermisson($id)
    {
        return Permission::findOrFail($id);
    }

    public function deleteRole($id)
    {
        return true;
    }

}
