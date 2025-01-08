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
    }
}
