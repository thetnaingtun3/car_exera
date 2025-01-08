<?php

namespace Database\Seeders;

use App\Models\Admin;

use App\Models\Batch;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\AdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
//        $this->call(CountriesSeeder::class);
//        User::factory(100)->create();

    }
}
