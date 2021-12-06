<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'superadmin',
            'username' => 'superadmin',
            'password' => bcrypt("testing123"),
            'role_id' => 1
        ]);
    }
}
