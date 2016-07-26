<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;
use App\User;
/**
 * Description of AdminUserRepository
 *
 * @author nthanh
 */
class AdminUserRepository
{
    public function getListUser($condition = null)
    {
        return User::all();
    }
    
    public function createUser($data)
    {
        
    }
}
