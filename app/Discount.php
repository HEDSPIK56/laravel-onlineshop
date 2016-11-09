<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends BaseModel
{

    use SoftDeletes;

    protected $table = "discounts";

    protected $fillable = [
        'name',
        'discount_by_period',
        'discount_by_quantity',
        'min_quantity',
        'price_type',
        'period_from',
        'period_to',
    ];

    /**
     * Relationship Discount vs Product
     * @return type
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'discount_id', 'id');
    }

    /**
     * Query scope
     */
    public function scopeActive($query)
    {
        //return $query->where('deleted_at', '<>', '');
        return $query;
    }

    public function scopeSearchByKeyword($query, $condition)
    {
        $keyword = $condition->getKeyWord();

        if ($keyword != '')
        {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }

    public function scopeSortKeyCondition($query, $condition)
    {
        $sort_type = $condition->getSortType();

        if(!is_null($sort_type)){
            $query->orderBy($sort_type, 'desc');
        }
        return $query;
    }

    /**
     * End query scope
     */
}
