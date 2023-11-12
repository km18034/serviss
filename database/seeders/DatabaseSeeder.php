<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AdminUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    //    $this->call([
    //         AdminUserSeeder::class
    //    ]);
    //\App\Models\Customer::factory(10)->create();
    AdminUser::factory(10)->create();
    }
}
