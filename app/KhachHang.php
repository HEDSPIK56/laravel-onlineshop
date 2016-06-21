<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HoaDon;

class KhachHang extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'khachhang';

    /**
     * Khach hang has many hoa don
     * @return type
     */
    public function hoaDons()
    {
        return $this->hasMany('App\HoaDon');
    }

}
