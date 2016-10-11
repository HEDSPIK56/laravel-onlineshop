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
use Illuminate\Support\Facades\Auth;

class AdminDataCategoryRepository
{
    /**
     *
     */
    public function addCategory($data)
    {
        $category = new Category();
        $category->fill($data);
        if ($category->save())
        {
            return $category;
        }
        return false;
    }

    public function getCategories($condition = null)
    {
        if($condition){
            return;
        }
        return Category::getAllCategory();
    }

    /**
     * @param $id
     */
    public function readCategory($id){
        return Category::active()->findOrFail($id);
    }

    /**
     * @param AdminCopyCategoryCondition $condition
     * @author: NTHanh
     * @inheritdoc: copy 1 one or multi category
     *            one category add more product
     */
    public function copyCategory($condition)
    {
        $created_by = Auth::user()->profile->getFullName();
        $cateIds = $condition->getIds();
        $categories = $this->getCategories();
        $categories = $this->mapCategory($categories->toArray(), $cateIds);
        $result = array();
        foreach($categories as $cat){
            unset($cat['id'], $cat['created_at'], $cat['updated_at']);
            $_name = $cat['name'] . " copy";
            $cat['name'] = $_name;
            $cat['created_by'] = $created_by;
            $result[] = (boolean) $this->addCategory($cat);
        }

        return count($result);
    }

    /**
     * @param $collection
     * @param $ids
     */
    private function mapCategory($categories, $ids){
        $newCollection = array_map(function($item) use($ids){
            if(in_array($item['id'], $ids)){
                return $item;
            }
        }, $categories);
        return $newCollection;
    }
}