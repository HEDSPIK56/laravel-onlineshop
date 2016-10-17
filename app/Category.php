<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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
        'load_more', 
        'created_by',
        'use_question_answer',
        'use_share_social_network'
    ];

    /**
     * The attributes that should be mutated to dates.
     * @var type 
     */
    protected $dates = ['deleted_at'];

    /**
     * relation product table
     * @return type
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    /**
     * @author NTHanh
     * @todo Get product list by active
     * @return type
     */
    public function getProductActive()
    {
        return $this->products()->active();
    }

    /**
     * @todo Get all category in page
     * @return type
     */
    public static function getAllCategory()
    {
        return self::where('visible', 'Y')->get();
    }

    /**
     * Query scope
     * @param type $value
     * @return type
     */
    public function scopeActive($query)
    {
        return $query->where('visible', '=', 'Y');
    }

    /**
     * End query scope
     * @param type $value
     * @return type
     */
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
    
    public function setCreatedByAttribute($email)
    {
        $this->attributes['created_by'] = Auth::user()->email;
    }
    
    public function setUpdatedByAttribute($email)
    {
        $this->attributes['updated_by'] = Auth::user()->email;
    }
}
