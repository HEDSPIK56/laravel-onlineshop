<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\Helper;

/**
 * Description of FriendlyUrlHelper
 *
 * @author nthanh
 */
class FriendlyUrlHelper
{

    private static $_helper = null;
    protected $pages;
    protected $booking_views = array ('list', 'booking', 'detail');

    public function __construct()
    {
        return $this;
    }

    public static function instance()
    {
        if (null == self::$_helper)
        {
            self::$_helper = new FriendlyUrlHelper();
        }
        return self::hepler;
    }

}
