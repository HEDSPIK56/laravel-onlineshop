<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Condition\Admin;
use App\BaseAbstractBean;
/**
 * Description of AdminDiscountSearchCondition
 *
 * @author nthanh
 */
class AdminDiscountSearchCondition extends BaseAbstractBean
{
    public $id;
    public $keyword;
    public $limit;
    public $sortType;
    public $name;
    public $discount_by_period = 0;
    public $discount_by_quantity = 0;
    public $min_quantity = 0;
    public $period_from;
    public $period_to;

    public function getId(){
        return (int)$this->id;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getDiscountByPeriod(){
        return (int)$this->discount_by_period;
    }

    public function getDiscountByQuantity(){
        if(!is_null($this->discount_by_quantity)){
            return (int)$this->discount_by_quantity;
        }
        return 0;
    }

    public function getPeriodFrom(){
        return $this->period_from;
    }

    public function getPeriodTo(){
        return $this->period_to;
    }

    public function getSortType()
    {
        return "created_at";
    }

    public function getLimit()
    {
        if (!$this->limit)
        {
            return config('app.pagination');
        }
        return (int) $this->limit;
    }

    public function getKeyWord()
    {
        return $this->keyword;
    }
}
