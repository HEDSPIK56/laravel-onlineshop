<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Condition;

use App\BaseAbstractBean;

/**
 * Description of ProductSearchCondition
 *
 * @author nthanh
 */
class ProductSearchCondition extends BaseAbstractBean
{

    public $id;
    public $productName;
    public $sortType;
    public $itemPerPage;

    public function getId()
    {
        return (int) $this->id;
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function getItemPerPage()
    {
        return (int) $this->itemPerPage;
    }

    public function getSortType()
    {
        return "DESC";
    }

}
