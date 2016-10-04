<?php

namespace App\Http\Controllers\Admin\EshopSystem;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Repository\AdminRoleRepository;
use App\Condition\AdminRoleSearchCondition;
use App\Http\Requests\Admin\System\RoleRequest;
use App\Repository\AdminPermissionRepository;
class RolesController extends Controller
{

    protected $roles;
    private $permission;
    //http://demo.itsolutionstuff.com/acl/roles
    //http://itsolutionstuff.com/post/laravel-52-user-acl-roles-and-permissions-with-middleware-using-entrust-from-scratch-tutorialexample.html

    public function __construct(AdminRoleRepository $roles, AdminPermissionRepository $permission)
    {
        $this->roles = $roles;
        $this->permission = $permission;
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
        $permission = $this->permission->getListPermission();
        return view('admin.eshopsystem.roles.create', compact('permission'));
    }

    public function store(RoleRequest $request)
    {
        if (is_null($request))
        {
            $request = \Request::instance();
        }
        $result = $this->roles->createRole($request->all(), $request->input('permission'));
        if ($result)
        {
            return redirect()->route('admin.system.role.index');
        }
        return redirect()->back()->withErrors(['errors' => 'Cannot save role']);
    }

    public function show($id)
    {
        $role = $this->roles->readRole($id);
        $roles_permisson = "";//$role->perms();
        $ids = $this->roles->getIdsRolePermisson($id);
        $permissions = $this->permission->getListPermission();
        return view('admin.eshopsystem.roles.show', compact('role', 'roles_permisson','permissions','ids'));
    }

}
