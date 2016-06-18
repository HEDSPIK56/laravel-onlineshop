<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Models\Beans;

use App\Models\AbstractBean;
/**
 * Description of KhachHangBean
 *
 * @author NTHanh
 */
class KhachHangBean extends AbstractBean{
    //put your code here
    //define table
    protected $table = 'khachhang';
    
    //define fields name can assigned
    protected $fillable = array();
    
    // define $error is store if this has error
    protected $errors;

    /**
     * Define relation to other table
     */
    
    /**
     * End define relation to other table
     */
    
    /**
     * Validation table
     * @todo Validator::make($request, $KhachHang::$rules['create']);
     */
    public static $rules = array(
        'create' => array(
            'first_name' => 'min:3'
        ),
        'edit' => array(
            
        )
    );
    /**
     * End validation table
     */
    
}
