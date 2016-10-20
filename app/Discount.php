<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Discount extends Model
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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
        return $query->onlyTrashed();
    }

    /**
     * End query scope
     */
}
