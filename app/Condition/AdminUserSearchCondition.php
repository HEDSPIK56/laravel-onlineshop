<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Condition;
use App\BaseAbstractBean;
/**
 * Description of AdminUserSearchCondition
 *
 * @author nthanh
 */
class AdminUserSearchCondition extends BaseAbstractBean
{
    public $keyword;
    public $limit;
    public $sortType;
    
    public function getLimit()
    {
        if (!$this->limit)
        {
            return config('app.pagination');
        }
        return (int) $this->limit;
    }
    
    public function getSortType()
    {
        return "DESC";
    }
    public function getKeyWord()
    {
        return $this->keyword;
    }
}
