<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rootAdmin = Admin::create([
            'role_id' => 1,
            'name' => "RootAdmin",
            'email' => "root@admin.com",
            'password' => bcrypt('password')
        ]);
        $rootAdmin->assignRole('root-admin');

        $admin = Admin::create([
            'role_id' => 2,
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt('password')
        ]);
        $admin->assignRole('admin');
        $transoper = Admin::create([
            'role_id' => 3,
            'name' => "Transoper",
            'email' => "transoper@gmail.com",
            'password' => bcrypt('password')
        ]);
        $transoper->assignRole('transoper');

        $loading = Admin::create([
            'role_id' => 4,
            'name' => "Loading",
            'email' => "loading@gmail.com",
            'password' => bcrypt('password')
        ]);
        $loading->assignRole('loading');

        $production = Admin::create([
            'role_id' => 5,
            'name' => "Production",
            'email' => "production@gmail.com",
            'password' => bcrypt('password')
        ]);
        $production->assignRole('production');

    }
}
