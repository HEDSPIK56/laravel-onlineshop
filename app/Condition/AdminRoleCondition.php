<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Condition;

use App\BaseAbstractBean;

/**
 * Description of AdminRoleCondition
 *
 * @author nthanh
 */
class AdminRoleCondition extends BaseAbstractBean
{

    public $id;
    public $name;
    public $display_name;
    public $description;
    public $level;
    public $permission;

    public function getId()
    {
        return (int) $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDisplayName()
    {
        return $this->display_name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLevel()
    {
        return (int) $this->level;
    }

    public function getPermissionIds()
    {
        return (array) $this->permission;
    }

}
