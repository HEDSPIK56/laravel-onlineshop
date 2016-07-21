<?php

namespace App\Http\Controllers\Admin\EshopSystem;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Repository\AdminRoleRepository;
use App\Condition\AdminRoleSearchCondition;
use App\Http\Requests\Admin\System\RoleRequest;

class RolesController extends Controller
{

    protected $roles;
    private $role;
    private $permission;

    public function __construct(AdminRoleRepository $roles)
    {
        $this->roles = $roles;
    }

    public function index(Request $request)
    {
        $condition = new AdminRoleSearchCondition();
        $condition->setAttributes($request->all());
        $roles     = $this->roles->getListRole($condition);
        return view('admin.eshopsystem.roles.index', compact('roles', 'condition'));
    }

    public function create()
    {
        return view('admin.eshopsystem.roles.create');
    }

    public function store(RoleRequest $request)
    {
        if (is_null($request))
        {
            $request = \Request::instance();
        }
        $result = $this->roles->createRole($request->all());
        if ($result)
        {
            //success
            return redirect()->route('admin.system.role.index');
        }
        return redirect()->back()->withErrors(['errors' => 'Cannot save role']);
    }

    public function show($id)
    {
        $result = $this->roles->readRole($id);
        dd($result->perms());
    }

}
