<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
