<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Condition;
use App\BaseAbstractBean;

/**
 * Description of AdminCopyCategoryCondition
 *
 * @author nthanh
 */
class AdminCopyCategoryCondition extends BaseAbstractBean
{
    public $ids;
    
    public function getIds(){
        return (array) $this->ids;
    }
}
