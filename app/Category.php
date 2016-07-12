<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;

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

    /**
     * The attributes that should be mutated to dates.
     * @var type 
     */
    protected $dates = ['deleted_at'];

    public function products()
    {
        $this->hasMany(Product::class, 'category_id', 'id');
    }

    /**
     * @todo Get all category in page
     * @return type
     */
    public static function getAllCategory()
    {
        return self::where('visible', 'Y')->get();
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
            case 0:
                {
                    $result = "Center";
                    break;
                }
            case 1:
                {
                    $result = "Right";
                    break;
                }
            default:
                {
                    $result = "Left";
                    break;
                    ;
                }
        }
        return $result;
    }

}
