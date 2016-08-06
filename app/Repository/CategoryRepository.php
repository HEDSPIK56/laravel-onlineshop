<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;
use App\Category;

/**
 * Description of CategoryRepository
 *
 * @author NTHanh
 */
class CategoryRepository
{
    public function getListCategory()
    {
//        $categories = Category::with('products')->get()->sortByDesc(function($category) {
//            return $category->products()->active()->count();
//        });
        $categories = Category::active()->get();
        return $categories;
    }

}
