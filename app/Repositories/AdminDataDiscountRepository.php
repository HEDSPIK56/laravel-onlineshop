<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Discount;
use App\Condition\Admin\AdminDiscountSearchCondition;
/**
 * Description of AdminDataDiscountRepository
 *
 * @author nthanh
 */
class AdminDataDiscountRepository
{
    /**
     * 
     * @param AdminDiscountSearchCondition $condition
     * @return type
     */
    public function fetchListDiscount($condition)
    {
        return null;
    }
    
    public function fetchOneDiscount($condition)
    {
        
    }

    /**
     * @param $condition
     */
    public function insertDiscount($condition)
    {
        $discount = new Discount();
        $data = (array)$condition->toArray();
        unset($data['id']);
        $discount->fill($data);

        if($discount->save()){
            return $discount;
        }
        return false;
    }
    
    public function updateDiscount($condition){
        
    }
    
    public function deleteDiscount($condition){
        
    }
}
