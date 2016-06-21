<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LoaiSanPham;
use App\BaseAbstractBean;

class SanPham extends BaseAbstractBean
{

    public $id;
    public $ma_san_pham;
    public $ten_san_pham;
    public $ma_loai;
    public $gia_tien;
    public $so_luong_tien;
    public $don_vi_tinh;

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
    public function loaiSanPham()
    {
        return $this->belongsTo('App\LoaiSanPham');
    }

    // Query scope
    // End query scope

    /**
     * Defind mutator name
     */
    public function getMaSanPham()
    {
        return $this->ma_san_pham;
    }

    public function getTenSanPham()
    {
        return $this->ten_san_pham;
    }

    /**
     * 
     * @param LoaiSanPham $value
     * @return string
     */
    public function getTenLoaiSanPham()
    {
        return $this->loaiSanPham()->getTenLoai();
    }

    public function getGiaTien()
    {
        return (int) $this->gia_tien;
    }

    public function getDonViTinh()
    {
        return $this->don_vi_tinh;
    }

    public function getSoLuongTon()
    {
        return $this->so_luong_tien;
    }

    /**
     *  Kiem tra xem san pham do con hang hay het hang
     * @return boolean
     */
    public function kiemTraHetHang()
    {
        // result = false: het hang
        $result = false;
        if ($this->getSoLuongTon() > 0)
        {
            $result = true;
        }
        return $result;
    }

}
