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
        $data = $this->systemSettingResp->getSystemSetting();
        return view('admin.eshopsystem.system-setting.index', compact('data'));
    }

    public function create()
    {
        return view('admin.eshopsystem.system-setting.create');
    }

    public function store(Request $request)
    {
        $this->systemSettingResp->createSystemSetting($request->all());
        return redirect()->route('admin.system.system-setting.index');
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

}
