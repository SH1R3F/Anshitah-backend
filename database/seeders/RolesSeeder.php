<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'مدير']);
        $adminPermissions = Permission::all();
        $admin->syncPermissions($adminPermissions);

        Role::create(['name' => 'طالب']);
    }
}
