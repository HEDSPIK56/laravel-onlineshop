<?php

namespace App\Http\Controllers\Admin\EShopSystem;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\AdminSystemSettingRepository;

class SystemSettingController extends AdminController
{

    protected $systemSettingResp;

    public function __construct(AdminSystemSettingRepository $res)
    {
        parent::__construct();
        $this->systemSettingResp = $res;
    }

    public function index()
    {
        return view('admin.eshopsystem.system-setting.index');
    }

    public function create()
    {
        return view('admin.eshopsystem.system-setting.create');
    }

    public function store(Request $request)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

}
