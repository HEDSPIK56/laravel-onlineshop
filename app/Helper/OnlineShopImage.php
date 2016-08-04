<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\Helper;

/**
 * Description of OnlineShopImage
 *
 * @author nthanh
 */
class OnlineShopImage
{
    private $image;
    private $width, $height;
    private $type, $mime;
    private $memoryLimit = null;

    private $thumb_sizes = array(
        'xs' => 500,
        'sm' => 768,
        'md' => 1024,
        'lg' => 1920
    );

    public $path;

    private function isValid($file, $width, $height)
    {
        if($height <= 0 && $width <= 0){ 
            return false;
        }

        if($file == ''){
            return false;
        }

        if(!file_exists($this->path . $file)){  
            return false;
        }

        return true;
    }

    public function createThumbnailList($file)
    {
        //$this->setMemoryLimit($file);
        $result = array();
        foreach($this->thumb_sizes as $type => $size){
            $result[$type] = $this->createThumbnail($file, $size, $size, $type);
        }
        
        //$this->finish();

        return $result;
    }

    public function createThumbnail($file, $width, $height, $type)
    {
        if(!$this->isValid($file, $width, $height)){
            return false;
        }
        
        $img_path = dirname($file) . '/';
        $img_name = basename($file);
        $output = $img_path . $type . '_' . $img_name;

        $this->load($file);
        // Temporary fix for image too large and it exceed the PHP memory_limit.
        if($this->image) {
            if ($this->width <= $width && $this->height <= $height) {
                $this->save($output);
            } else {                
                $this->resizeFixWidth($width);
                
                /*
                $this->resize($width, $height);
                if ($this->width > $width || $this->height > $height) {
                    $this->crop($width, $height);
                }
                */
                
                $this->save($output);
            }
            imagedestroy($this->image);
        }
        else{
            $output = $img_path . $img_name;
        }

        return $output;
    }

    private function calculateResizeSizeFixWidth($width)
    {
        // image width less than thumbnail width
        if($this->width <= $width) {
            $finalWidth = $this->width;
            $finalHeight = $this->height;
        }
        else{
            if ($this->width < $this->height) {
                $ratio = $this->height / $this->width;
                $finalWidth = $width;
                $finalHeight = $finalWidth * $ratio;
            }
            else {
                $ratio = $this->height / $this->width;
                $finalHeight = $width * $ratio;
                $finalWidth = $width;
            }
        }

        return array($finalWidth, $finalHeight);
    }
    
    private function calculateResizeSize($width, $height)
    {
        // image width and height less than thumbnail width and height
        if($this->width <= $width && $this->height <= $height) {
            $finalWidth = $this->width;
            $finalHeight = $this->height;
        }
        // image width and height greater than thumbnail width and height
        elseif($this->width > $width && $this->height > $height){
            $finalWidth = $width;
            $finalHeight = $height;
            if ($this->width < $this->height) {
                $ratio = $this->height / $this->width;
                $finalWidth = $width;
                $finalHeight = $finalWidth * $ratio;
            }
            elseif ($this->width > $this->height) {
                $ratio = $this->width / $this->height;
                $finalHeight = $height;
                $finalWidth = $finalHeight * $ratio;
            }
        }
        // only one size of image less than thumbnail size
        else{
            if ($this->width < $this->height) {
                $ratio = $this->width / $this->height;
                $finalWidth = $this->width * $ratio;
                $finalHeight = $this->width;
            }
            else{
                $ratio = $this->height / $this->width;
                $finalHeight = $this->height * $ratio;
                $finalWidth = $this->height;
            }
        }

        return array($finalWidth, $finalHeight);
    }

    private function calculateCropSize($width, $height)
    {
        $cropStartX = 0;
        $cropStartY = 0;
        $finalWidth = $width;
        $finalHeight = $height;
        if($this->width < $this->height){
            $centerX = $width / 2;
            $centerY = $this->height / 2;

            $cropStartX = 0;
            $cropStartY = $centerY - $centerX;
            $finalWidth = $width;
            $finalHeight = $width;	//$cropStartY + $height;   //$centerY + $centerX;
        }
        elseif($this->width > $this->height){
            $centerX = $this->width / 2;
            $centerY = $height / 2;

            $cropStartX = $centerX - $centerY;
            $cropStartY = 0;
            $finalWidth = $height;	//$cropStartX + $width; //$centerX + $centerY;
            $finalHeight = $height;
        }

        return array($cropStartX, $cropStartY, $finalWidth, $finalHeight);
    }

    private function createImageResource($width, $height)
    {
        $img = imagecreatetruecolor($width, $height);
        if($this->type == IMAGETYPE_GIF || $this->type == IMAGETYPE_PNG){
            $transparency = imagecolortransparent($this->image);
            $palletSize = imagecolorstotal($this->image);
            if($transparency >= 0 && $transparency < $palletSize){
                $transparentColor = imagecolorsforindex($this->image, $transparency);
                $transparency = imagecolorallocate($img, $transparentColor['red'], $transparentColor['green'], $transparentColor['blue']);
                imagefill($img, 0, 0, $transparency);
                imagecolortransparent($img, $transparency);
            }

            if($this->type == IMAGETYPE_PNG) {
                imagealphablending($img, false);
                $color = imagecolorallocatealpha($img, 0, 0, 0, 127);
                imagefill($img, 0, 0, $color);
                imagesavealpha($img, true);
            }
        }

        return $img;
    }

    public function load($file)
    {
        $file = $this->path . $file;
        
        $info = getimagesize($file);
        $this->width  = $info['0'];
        $this->height = $info['1'];
        $this->mime = $info['mime'];
        $this->type = $info['2'];
        
        // Max pixels
        $maxPixels = $this->width * $this->height;
        // 134217728 bytes => 4194304 pixels
        if ($maxPixels > 3000000) {
            ini_set('memory_limit', $maxPixels * 32);
        }

        switch ($info['mime']) {                        
            case 'image/gif':
                $this->image = imagecreatefromgif($file);
                break;
            case 'image/jpeg':
                $this->image = imagecreatefromjpeg($file);
                break;
            case 'image/png':
                $this->image = imagecreatefrompng($file);
                break;
        }
    }

    public function save($file, $quality = 100)
    {
        $file = $this->path . $file;
        /*
        $path = dirname($file);
        if(!is_dir($path)){
            mkdir($path, 0x777, true);
        }
        */

        switch($this->type){
            case IMAGETYPE_GIF:
                imagegif($this->image, $file);
                break;
            case IMAGETYPE_JPEG:
                imagejpeg($this->image, $file, $quality);
                break;
            case IMAGETYPE_PNG:
                $quality = 9 - (int)((0.9 * $quality) / 10.0);
                imagepng($this->image, $file, $quality);
                break;
            default:
                return false;
        }
    }

    public function resize($width, $height)
    {
        $size = $this->calculateResizeSize($width, $height);
        $finalWidth = $size[0];
        $finalHeight = $size[1];

        $img = $this->image;
        $this->image = $this->createImageResource($finalWidth, $finalHeight);
        imagecopyresampled($this->image, $img, 0, 0, 0, 0, $finalWidth, $finalHeight, $this->width, $this->height);
        imagedestroy($img);

        $this->width = $finalWidth;
        $this->height = $finalHeight;
    }

    public function resizeFixWidth($width)
    {
        $size = $this->calculateResizeSizeFixWidth($width);

        $finalWidth = $size[0];
        $finalHeight = $size[1];

        $img = $this->image;
        $this->image = $this->createImageResource($finalWidth, $finalHeight);
        imagecopyresampled($this->image, $img, 0, 0, 0, 0, $finalWidth, $finalHeight, $this->width, $this->height);
        imagedestroy($img);

        $this->width = $finalWidth;
        $this->height = $finalHeight;
    }
    
    function crop($width, $height)
    {
        $size = $this->calculateCropSize($width, $height);
        $cropStartX = $size[0];
        $cropStartY = $size[1];
        $finalWidth = $size[2];
        $finalHeight = $size[3];

        $crop = $this->image;
        $this->image = $this->createImageResource($width , $height);
        imagecopyresampled($this->image, $crop , 0, 0, $cropStartX, $cropStartY, $width, $height, $finalWidth, $finalHeight);
        imagedestroy($crop);

        $this->width = $finalWidth;
        $this->height = $finalHeight;
    }

    private function setMemoryLimit($file)
    {
        $this->memoryLimit = @ini_get('memory_limit');

        $info = getimagesize($file);
        $width  = $info['0'];
        $height = $info['1'];

        $size = $this->memoryLimit + floor(($width * $height * 4 * 1.5 + 1048576) / 1048576);

        @ini_set('memory_limit', $size.'M');
        //echo ini_get('memory_limit');die;
    }

    private function finish()
    {
        if($this->memoryLimit) {
            @ini_set('memory_limit', $this->memoryLimit . 'M');
        }
    }
}
