<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;

use App\Product;
use App\Condition\ProductSearchCondition;
use Cart;

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
        return Product::active()->paginate(9);
    }

    public function getNewsProduct($condition)
    {
        // to do
        return Product::active()->newproductcreate()->take(2)->get();
    }

    public function getProductByCategory($condition)
    {
        // todo
    }

    public function readProduct($condition)
    {
        return Product::find($condition->getId());
    }

    public function relatedProducts($condition)
    {
        return Product::active()->newproductcreate()->take(4)->get();
    }

    public function updateNumberLike($condition)
    {
        // todo
    }

    public function updateNumberView($condition)
    {
        $product = $this->readProduct($condition);
        $product->updateNumberView();
        $product->save();
    }

    public function updateNumberBookmark($condition)
    {
        // todo
    }

    public function updateNumberShare($condition)
    {
        
    }

    public function getHistoryProductView($condition)
    {
        
    }
    
    public function addToCart($product_id)
    {
        $condition = new ProductSearchCondition();
        $condition->setAttributes(['id' => $product_id]);
        $product = $this->readProduct($condition);
        Cart::add(array(
            'id' => $product_id,
            'name' => $product->name,
            'qty' => 1,
            'price' =>$product->price
        ));
    }

}
