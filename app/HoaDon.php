<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hoadon';

    /**
     * Hoa don has one Khach Hang
     * @return type
     */
    public function khachHang()
    {
        return $this->belongsTo('App\KhachHang');
    }

    /*
     * Hoa Don has many ChiTietHoaDon
     */

    public function chiTietHoaDons()
    {
        return $this->hasMany('App\ChiTietHoaDon');
    }

}
