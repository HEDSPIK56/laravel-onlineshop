<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SanPham;

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

}
