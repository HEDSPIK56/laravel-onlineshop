<?php

namespace App;

use App\SanPham;
use App\BaseAbstractBean;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id Description
 * @property string $ma_san_pham Description
 */
class LoaiSanPham extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'loaisanpham';

    /**
     * The attributes that are mass assigneble
     * @var array
     */
    protected $fillable = ['ma_loai', 'ten_loai'];

    /**
     * Define a one-to-many relationship.
     * $related, $foreignKey = null, $localKey = null
     * @return type
     */
    public function sanPhams()
    {
        return $this->hasMany('App\SanPham', 'ma_loai', 'ma_loai');
    }

    public function getTenLoai()
    {
        return $this->getAttribute('ten_loai');
    }

}
