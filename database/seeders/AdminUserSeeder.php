<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = password_hash('kamila', PASSWORD_DEFAULT);

        DB::table('admin_user')->insert([
            'name' => 'Kamila',
            'surname' => 'Mickeviča',
            'email' => 'kamila.mickevica@gmail.com',
            'phone' => '24777896',
            'password' => $password,
            'role' => 'admin'
        ]);
    }
}
