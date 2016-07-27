<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;

use App\User;

/**
 * Description of AdminUserRepository
 *
 * @author nthanh
 */
class AdminUserRepository
{

    public function getListUser($condition = null)
    {
        return User::all();
    }

    public function createUser($data)
    {
        
    }

    public function processUploadAvatar($request, $id)
    {
        $file = $request->file('avatar');
   
      //Display File Name
      echo 'File Name: '.$file->getClientOriginalName();
      echo '<br>';
   
      //Display File Extension
      echo 'File Extension: '.$file->getClientOriginalExtension();
      echo '<br>';
   
      //Display File Real Path
      echo 'File Real Path: '.$file->getRealPath();
      echo '<br>';
   
      //Display File Size
      echo 'File Size: '.$file->getSize();
      echo '<br>';   
      //Move Uploaded File
      $destinationPath = 'images/users/'.$id.'';
      $file->move($destinationPath,$file->getClientOriginalName());
    }

}
