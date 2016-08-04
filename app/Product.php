<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{

    protected $table = "products";
    protected $fillable = [
        'category_id',
        'discount_id',
        'tags',
        'keywords',
        'price',
        'market_price',
        'status',
        'desciption',
        'use_icon',
        'use_icon_period_from',
        'use_icon_period_to',
        'images',
        'visible',
        'use_slideshow',
        'number_view',
        'number_like',
        'number_bookmark',
        'number_share',
        'number_item'
    ];

    public function category()
    {
        return $this->hasOne(Category::class);
    }
    
    public function setCreatedByAttribute($email)
    {
        $this->attributes['created_by'] = Auth::user()->email;
    }
    
    public function setUpdatedByAttribute($email)
    {
        $this->attributes['updated_by'] = Auth::user()->email;
    }

}
