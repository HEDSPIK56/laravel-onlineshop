<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LoaiSanPham;

class SanPham extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sanpham';

    /**
     * Defind relationship one - to many
     * @return type
     */
    public function sanPham()
    {
        return $this->belongsTo('App\LoaiSanPham');
    }

}
