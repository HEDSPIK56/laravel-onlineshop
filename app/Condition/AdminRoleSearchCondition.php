<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Condition;

use App\BaseAbstractBean;

/**
 * Description of AdminRoleSearchCondition
 *
 * @author nthanh
 */
class AdminRoleSearchCondition extends BaseAbstractBean
{

    public $keyword;
    public $limit;
    public $sortType;
    public $name;
    public $display_name;

    public function getName()
    {
        return $this->name;
    }

    public function getDisplayName()
    {
        return $this->display_name;
    }

    public function getSortType()
    {
        return "DESC";
    }

    public function getLimit()
    {
        if (!$this->limit)
        {
            return 1;
        }
        return (int) $this->limit;
    }

}
