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

}
