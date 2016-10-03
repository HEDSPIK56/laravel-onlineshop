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
        $role = $this->roles->readRole($id);
        $roles_permisson = "";//$role->perms();
        $ids = $this->roles->getIdsRolePermisson($id);
        $permissions = $this->permission->getListPermission();
        return view('admin.eshopsystem.roles.show', compact('role', 'roles_permisson','permissions','ids'));
    }

}
