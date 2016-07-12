<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Role;
use App\User;
use Bican\Roles\Models\Permission;

class UserRolesPermissonSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
                    'name' => 'Admin',
                    'slug' => 'admin',
                    'description' => 'administrator', // optional
                    'level' => 1, // optional, set to 1 by default
        ]);

        $webAdminRole = Role::create([
                    'name' => 'Web Admin Role',
                    'slug' => 'admin.web',
                    'description' => 'admin web', // optional
                    'level' => 2, // optional, set to 1 by default
        ]);

        $publisherRole = Role::create([
                    'name' => 'Publisher',
                    'slug' => 'admin.publisher',
                    'description' => 'admin publisher', // optional
                    'level' => 3, // optional, set to 1 by default
        ]);

        $webAdminRole = Role::create([
                    'name' => 'User role',
                    'slug' => 'user',
                    'description' => 'user in system', // optional
                    'level' => 4, // optional, set to 1 by default
        ]);

        $createUsersPermission = Permission::create([
                    'name' => 'Create users',
                    'slug' => 'create.users',
                    'description' => '', // optional
        ]);

        $deleteUsersPermission = Permission::create([
                    'name' => 'Delete users',
                    'slug' => 'delete.users',
        ]);

        //Admin user
        DB::table('users')->insert([
            'name' => 'sysadmin',
            'email' => 'taihanh0310@gmail.com',
            'password' => bcrypt('qwer1234'),
            'activated' => '1'
        ]);

        $user = User::where('email', 'taihanh0310@gmail.com');
        $user->attachRole($adminRole); // in case you want to detach role
    }

}
