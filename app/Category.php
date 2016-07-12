<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;

class Category extends Model
{

    protected $table = "categories";
    protected $fillable = [
        'name',
        'standard_info',
        'visible',
        'use_breadcrumb',
        'use_search',
        'view_type',
        'align_type',
        'item_per_page',
        'item_per_line',
        'load_more'
    ];

    public function products()
    {
        $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getViewTypeNameAttribute($value)
    {
        $temp = $this->getAttribute('view_type');
        if ($temp == '0')
        {
            return "Grid View";
        }
        return "List View";
    }

    public function getAlignViewNameAttribute($value)
    {
        $temp = $this->getAttribute('align_type');
        $result = "";
        switch ($temp)
        {
            
        }
        return $result;
    }

}
