<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PermissionGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_group')->insert([
            'name' => 'admin',
            'guard_name' => 'admin',
        ]);
    }
}
