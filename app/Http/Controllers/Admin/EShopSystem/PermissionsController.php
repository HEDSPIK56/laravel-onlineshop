<?php

namespace App\Http\Controllers\Admin\EshopSystem;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repository\AdminPermissionRepository;
use App\Repository\AdminRoleRepository;

class PermissionsController extends Controller
{
    private $role;
    private $permission;

    public function __construct(AdminPermissionRepository $permission, AdminRoleRepository $role)
    {
        $this->permission = $permission;
        $this->role       = $role;
    }

    public function index()
    {
        $permissions = $this->permission->paginate(10);
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array('name' => 'required', 'display_name' => 'required', 'route' => 'required'));

        $permission = $this->permission->create($request->all());

        $role = $this->role->findBy('name', 'admin');

        $role->perms()->sync([$permission->id], false);

        Flash::success('Permission successfully created');

        return redirect('/permissions');
    }

    public function edit($id)
    {
        $permission = $this->permission->find($id);
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array('name' => 'required', 'display_name' => 'required', 'route' => 'required'));

        $permission = $this->permission->find($id);
        $permission->update($request->all());

        Flash::success('Permission successfully updated');

        return redirect('/permissions');
    }

    public function destroy($id)
    {
        $this->permission->delete($id);

        Flash::success('Permission successfully deleted');

        return redirect('/permissions');
    }

}
