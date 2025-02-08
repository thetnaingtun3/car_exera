<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $index = Permission::create(['name' => 'index', 'guard_name' => 'admin']);
//        $create = Permission::create(['name' => 'create', 'guard_name' => 'admin']);
//        $show = Permission::create(['name' => 'show', 'guard_name' => 'admin']);
//        $edit = Permission::create(['name' => 'edit', 'guard_name' => 'admin']);
//        $delete = Permission::create(['name' => 'delete', 'guard_name' => 'admin']);
//        $forum = Permission::create(['name' => 'forum', 'guard_name' => 'admin']);
//        $user_approve = Permission::create(['name' => 'user-approve', 'guard_name' => 'admin']);

        $rootAdmin = Role::create(['name' => 'root-admin', 'guard_name' => 'admin']);
        $admin = Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        $transoper = Role::create(['name' => 'registration', 'guard_name' => 'admin']);
        $loading = Role::create(['name' => 'loading', 'guard_name' => 'admin']);
        $production = Role::create(['name' => 'production', 'guard_name' => 'admin']);

        $rootAdmin->givePermissionTo(Permission::all());

//        $admin->givePermissionTo('index', 'show', 'create');
    }
}
