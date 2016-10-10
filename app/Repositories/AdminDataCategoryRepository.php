<?php
/**
 * Created by PhpStorm.
 * User: NTHanh
 * Date: 10/8/2016
 * Time: 7:30 AM
 */

namespace App\Repositories;
use App\Category;
use app\Helper\ShopArrayHelper;
use App\Condition\AdminCopyCategoryCondition;

class AdminDataCategoryRepository
{
    /**
     *
     */
    public function addCategory()
    {

    }

    public function getCategories($condition = null)
    {
        if($condition){
            return;
        }
        return Category::all();
    }

    /**
     * @param $id
     */
    public function readCategory($id){
        return ;
    }

    /**
     * @param AdminCopyCategoryCondition $condition
     * @author: NTHanh
     * @inheritdoc: copy 1 one or multi category
     *            one category add more product
     */
    public function copyCategory($condition)
    {
        $cateIds = $condition->getIds();
        $categories = $this->getCategories();
    }

    /**
     * @param $collection
     * @param $ids
     */
    private function mapCategory($categories, $ids){
        $newCollection = array_map(function($item) use($ids){
            if(in_array($item->id, $ids)){
                return $item;
            }
        }, $categories);
        return $newCollection;
    }
}