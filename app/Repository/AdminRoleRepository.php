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
     * @param type $condition
     * @return string
     */
    public function getListRole($condition)
    {
        return Role::all();
    }

}
