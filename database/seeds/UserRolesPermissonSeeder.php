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

        Role::create([
            'name' => 'root',
            'display_name' => 'Root',
            'description' => 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.'
        ]);
        Role::create([
            'name' => 'administrator',
            'display_name' => 'Administrator',
            'description' => 'Full access to create, edit, and update companies, and orders.'
        ]);
        Role::create([
            'name' => 'Manager',
            'description' => 'Ability to create new companies and orders, or edit and update any existing ones.'
        ]);
        Role::create([
            'name' => 'Company Manager',
            'description' => 'Able to manage the company that the user belongs to, including adding sites, creating new users and assigning licences.'
        ]);
        Role::create([
            'name' => 'User',
            'description' => 'A standard user that can have a licence assigned to them. No administrative features.'
        ]);
        //delete users table records
        DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'Adminstrator',
            'email' => 'taihanh0310@gmail.com',
            'password' => bcrypt('1234qwer'),
            'activated' => 1
        ]);

        $user = User::where('email', 'taihanh0310@gmail.com')->first();
        $user->roles()->attach($admin->id); // id only

        $editUser = new Permission();
        $editUser->name = 'edit-user';
        $editUser->display_name = 'Edit Users'; // optional
        $editUser->description = 'edit existing users'; // optional
        $editUser->save();

        $admin->attachPermission($editUser);
    }

}
