<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;
use App\SystemSetting;

/**
 * Description of AdminSystemSettingRepository
 *
 * @author nthanh
 */
class AdminSystemSettingRepository
{
    
    public function getSystemSetting()
    {
        return SystemSetting::where('id', '>=', 1)->firstOrFail();
    }
    
    public function createSystemSetting($data)
    {
        $system = new SystemSetting();
        $system->fill($data);
        return $system->save();
    }

        public function updateSystemSetting($data, $id)
    {
        $system = SystemSetting::findOrFail($id);
        if (!$system)
        {
            return false;
        }
        $system->fill($data);
        return $system->save();
    }
}
