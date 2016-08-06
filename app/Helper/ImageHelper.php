<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\Helper;
use app\Helper\OnlineShopImage;
/**
 * Description of ImageHelper
 *
 * @author nthanh
 */
class ImageHelper
{
    public static function makeThumbnail($path, $file) {
        $img = new OnlineShopImage();
        $img->path = $path;
        $result = $img->createThumbnailList($file);

        return $result;
    }

    public static function getThumbnail($path, $file, $type='xs') {
        $result = '';

        $imgName = basename($file);
        $ext = explode('.', $imgName);
        if(count($ext) <= 1 || !in_array(end($ext), array('gif', 'jpg', 'jpeg', 'png', 'bmp'))){
            return $result;
        }

        $thumb = $type . '_' . $imgName;
        if(!file_exists($path . $thumb)){
            $thumbnails = self::makeThumbnail($path, $file);
            if(!empty($thumbnails)){
                $thumb =  $thumbnails[$type];

                $result = $thumb;
            }
        }
        else{
            $result = $thumb;
        }

        return $result;
    }

    public static function deleteImageFolder($folder, $type)
    {
        $MODEL =& get_model('DUBU_Booking');
        $dir = $MODEL->img_path . "$type/$folder";
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            unlink("$dir/$file");
        }
        return rmdir($dir); 
    }
    public static function setMemoryLimit($file){
        $memoryLimit = @ini_get('memory_limit');
        $info = getimagesize($file);
        $width  = $info['0'];
        $height = $info['1'];

        $size = $memoryLimit + floor(($width * $height * 4 * 1.5 + 1048576) / 1048576);

        @ini_set('memory_limit', $size.'M');
    }
    public static function setMemoryLimitSize($size){
        $memoryLimit = @ini_get('memory_limit');
        $size = $memoryLimit + floor(($size + 1048576) / 1048576);

        @ini_set('memory_limit', $size.'M');
    }
}
