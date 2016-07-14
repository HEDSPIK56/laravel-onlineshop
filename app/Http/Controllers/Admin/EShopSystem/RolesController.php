<?php

namespace App\Http\Controllers\Admin\EshopSystem;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Repository\AdminRoleRepository;
use App\Condition\AdminRoleSearchCondition;

class RolesController extends Controller
{

    protected $roles;

    public function __construct(AdminRoleRepository $roles)
    {
        $this->roles = $roles;
    }

    public function index(Request $request)
    {
        $condition = new AdminRoleSearchCondition();
        $roles     = $this->roles->getListRole($condition);
        return view('admin.eshopsystem.roles.index', compact('roles'));
    }

}
