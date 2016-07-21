<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Permission;

class UserRolesPermissonSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() === 'production')
        {
            exit('I just stopped you getting fired. Love, Amo.');
        }

        DB::table('users')->delete();
        DB::table('permission_role')->delete();
        DB::table('role_user')->delete();
        DB::table('roles')->delete();
        DB::table('permissions')->delete();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $root               = new Role();
        $root->name         = "root";
        $root->display_name = "Root";
        $root->description  = "Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.";
        $root->save();

        Role::create([
            'name'         => 'manager',
            'display_name' => 'Manager',
            'description' => 'Ability to create new companies and orders, or edit and update any existing ones.'
        ]);
        Role::create([
            'name'         => 'company manager',
            'display_name' => 'Company Manager',
            'description' => 'Able to manage the company that the user belongs to, including adding sites, creating new users and assigning licences.'
        ]);
        Role::create([
            'name'         => 'user',
            'display_name' => 'User',
            'description' => 'A standard user that can have a licence assigned to them. No administrative features.'
        ]);
        //delete users table records
        DB::table('users')->insert([
            'name' => 'Adminstrator',
            'email' => 'taihanh0310@gmail.com',
            'password' => bcrypt('1234qwer'),
            'activated' => 1
        ]);

        $user = User::where('email', 'taihanh0310@gmail.com')->first();
        $user->roles()->attach($root->id); // id only

        $editUser = new Permission();
        $editUser->name = 'edit-user';
        $editUser->display_name = 'Edit Users'; // optional
        $editUser->description = 'edit existing users'; // optional
        $editUser->save();

        $manageRoles               = new Permission();
        $manageRoles->name         = 'manage_roles';
        $manageRoles->display_name = "Manage roles";
        $manageRoles->description  = "";
        $manageRoles->route        = "roles";
        $manageRoles->save();

        $createRoles               = new Permission();
        $createRoles->name         = 'create_roles';
        $createRoles->display_name = "Create roles";
        $createRoles->description  = "";
        $createRoles->route        = "roles/create";
        $createRoles->save();

        $updateRoles               = new Permission();
        $updateRoles->name         = 'update_roles';
        $updateRoles->display_name = "Update roles";
        $updateRoles->description  = "";
        $updateRoles->route        = "roles/{roles}/edit";
        $updateRoles->save();

        $destroyRoles               = new Permission();
        $destroyRoles->name         = 'delete_roles';
        $destroyRoles->display_name = "Delete roles";
        $destroyRoles->description  = "";
        $destroyRoles->route        = "roles/{roles}";
        $destroyRoles->save();


        $manageUsers               = new Permission();
        $manageUsers->name         = 'manage_users';
        $manageUsers->display_name = "Manager users";
        $manageUsers->description  = "";
        $manageUsers->route        = "users";
        $manageUsers->save();

        $createUsers               = new Permission();
        $createUsers->name         = 'create_users';
        $createUsers->display_name = "Create users";
        $createUsers->description  = "";
        $createUsers->route        = "users/create";
        $createUsers->save();

        $updateUsers               = new Permission();
        $updateUsers->name         = 'update_users';
        $updateUsers->display_name = "Update users";
        $updateUsers->description  = "";
        $updateUsers->route        = "users/{users}/edit";
        $updateUsers->save();

        $destroyUsers               = new Permission();
        $destroyUsers->name         = 'delete_users';
        $destroyUsers->display_name = "Delete users";
        $destroyUsers->description  = "";
        $destroyUsers->route        = "users/{users}";
        $destroyUsers->save();


        $managePerms               = new Permission();
        $managePerms->name         = 'manage_permissions';
        $managePerms->display_name = "Manage permissions";
        $managePerms->description  = "";
        $managePerms->route        = "permissions";
        $managePerms->save();

        $createPerms               = new Permission();
        $createPerms->name         = 'create_permissions';
        $createPerms->display_name = "Create permissions";
        $createPerms->description  = "";
        $createPerms->route        = "permissions/create";
        $createPerms->save();

        $updatePerms               = new Permission();
        $updatePerms->name         = 'update_permissions';
        $updatePerms->display_name = "Update permissions";
        $updatePerms->description  = "";
        $updatePerms->route        = "permissions/{permissions}/edit";
        $updatePerms->save();

        $destroyPerms               = new Permission();
        $destroyPerms->name         = 'delete_permissions';
        $destroyPerms->display_name = "Delete permissions";
        $destroyPerms->description  = "";
        $destroyPerms->route        = "permissions/{permissions}";
        $destroyPerms->save();

        $root->attachPermissions([$editUser, $manageRoles, $createRoles, $updateRoles, $destroyRoles, $manageUsers, $createUsers, $updateUsers, $destroyUsers, $managePerms, $createPerms, $updatePerms, $destroyPerms]);
    }

}
