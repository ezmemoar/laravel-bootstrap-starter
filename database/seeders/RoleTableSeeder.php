<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_name' => 'Superadmin',
            'role_status' => 1,
        ]);

        Role::create([
            'role_name' => 'Admin',
            'role_status' => 2,
        ]);
    }
}
