<?php

namespace App\Http\Controllers\Admin\EShopSystem;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repository\AdminUserRepository;
use App\Repository\AdminRoleRepository;
use App\Http\Requests\Admin\System\CreateUserRequest;

class UsersController extends Controller
{

    protected $userRes;
    protected $roleRes;
    
    public function __construct(AdminUserRepository $user, AdminRoleRepository $role)
    {
        $this->userRes = $user;
        $this->roleRes = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //http://demo.laraship.com/admin/users
    public function index()
    {
        $users = $this->userRes->getListUser();
        return view('admin.eshopsystem.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRes->getListRoleNoCondition();
        $user = \Illuminate\Support\Facades\Auth::user();
        return view('admin.eshopsystem.users.create', compact('roles','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = $this->userRes->createUser($request->all());
        if($request->file('avatar')){
            $user->avatar = $this->userRes->processUploadAvatar($request,$user->id);
            $user->save();
        }
        $request->session()->flash('status', 'User successfully created');

        return redirect()->route('admin.system.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user      = $this->user->find($id);
        $roles     = $this->role->all();
        $userRoles = $user->roles();
        return view('users.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->user->find($id);

        $user->email = $request->get('email');
        if ($request->get('password'))
        {
            $user->password = $request->get('password');
        }
        $user->save();

        if ($request->get('role'))
        {
            $user->roles()->sync($request->get('role'));
        }
        else
        {
            $user->roles()->sync([]);
        }

        Flash::success('User successfully updated');

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRes->deleteUser($id);
        
        return redirect()->route('admin.system.user.index');
    }
}
