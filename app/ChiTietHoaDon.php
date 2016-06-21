<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chitiethoadon';

    /**
     * Defind relationship one - to many
     * @return type
     */
    public function hoaDon()
    {
        return $this->belongsTo('App\HoaDon');
    }

}
