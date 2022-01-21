<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::create(['name' => 'superadmin', 'guard_name' => 'admin']);
        Role::create(['name' => 'admin', 'guard_name' => 'admin']);

        Permission::create(["name" => "list admin", 'group' => 'admin', 'guard_name' => 'admin']);
        Permission::create(["name" => "create admin", 'group' => 'admin', 'guard_name' => 'admin']);
        Permission::create(["name" => "edit admin", 'group' => 'admin', 'guard_name' => 'admin']);
        Permission::create(["name" => "delete admin", 'group' => 'admin', 'guard_name' => 'admin']);

        $permissions = Permission::all();
        $superadmin->syncPermissions($permissions);

        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Models\Admin',
            'model_id' => 1
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => 2,
            'model_type' => 'App\Models\Admin',
            'model_id' => 2
        ]);
    }
}
