<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;

use App\Condition\AdminProductSearchCondition;
use App\Product;

/**
 * Description of AdminProductRepository
 *
 * @author nthanh
 */
class AdminProductRepository
{

    /**
     * 
     * @param array $data
     * @return boolean|Product
     */
    public function addProduct($data)
    {
        $product = new Product();
        $product->fill($data);
        if ($product->save())
        {
            return $product;
        }
        return false;
    }

    /**
     * @author NTHanh
     * 
     * @param AdminProductSearchCondition $condition
     * @return boolean
     */
    public function readProduct($id)
    {
        return Product::find($id);
    }
    
    public function copyProduct($id)
    {
        $product = $this->readProduct($id);
        if ($product)
        {
            // set new name for product copy
            $product->setNewNameProductCopy();
            $product = $product->toArray();
            unset($product['id']);
            $newProduct = $this->addProduct($product);
            // copy image
            return $newProduct;
        }
        return array();
    }

    /**
     * 
     * @param AdminProductSearchCondition $condition
     * @return boolean
     */
    public function getListProduct($condition)
    {
        return Product::all();
    }

    /**
     * 
     * @param AdminProductSearchCondition $condition
     * @return boolean
     */
    public function updateProduct($condition)
    {
        return false;
    }

    /**
     * 
     * @param AdminProductSearchCondition $condition
     * @return boolean
     */
    public function deleteProduct($condition)
    {
        return false;
    }

}
