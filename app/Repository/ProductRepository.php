<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;

use App\Product;
use App\Condition\ProductSearchCondition;
/**
 * Description of ProductRepository
 *
 * @author nthanh
 */
class ProductRepository
{

    /**
     * 
     * @param ProductSearchCondition $condition
     */
    public function getAllProduct($condition)
    {
        return Product::all();
    }
    
    public function getNewsProduct($condition){
        // to do
    }
    
    public function getProductByCategory($condition){
        // todo
    }
    
    public function readProduct($condition){
        // todo
    }
    
    public function relatedProducts($condition){
        // todo
    }
    
    public function updateNumberLike($condition){
        // todo
    }
    public function updateNumberView($condition){
        // todo
    }
    public function updateNumberBookmark($condition){
        // todo
    }
    
    public function updateNumberShare($condition){
        
    }
    
    public function getHistoryProductView($condition){
        
    }
}
