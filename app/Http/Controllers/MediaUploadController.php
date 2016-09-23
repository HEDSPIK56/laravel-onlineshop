<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class MediaUploadController extends Controller
{
	public function index(Request $request){

		$file  = $request->file('images');
		dd($request->file('images'));
	$file_size = $file->getSize();
		$ext = strtolower( $file->getClientOriginalExtension() );

	        // checking file format
	        $format = $this->getFileFormat($ext);
	        $filename = date('U').str_random(10);
	        $file_path = "ds";
	    return [
	        'original' => [
	            'name' => $file->getClientOriginalName(),
	            'size' => $file_size,
	        ],
	        'ext' => $ext,
	        'format' => $format,
	        // 'image' => [
	        //     'size' =>$img->getSize(),
	        // ],
	        'name' => $filename,
	        'path' => $file_path,
	    ];
    }
    protected function getFileFormat($ext) {
    if ( preg_match('/(jpg|jpeg|gif|png)/', $ext) )
    {
        return 'image';
    }
    elseif( preg_match( '/(mp3|wav|ogg)/', $ext) )
    {
        return 'audio';
    }
    elseif( preg_match( '/(mp4|wmv|flv)/', $ext) )
    {
        return 'video';
    }
    elseif( preg_match('/txt/', $ext) )
    {
        return 'text';
    }
    
    return 'other';
}
}

