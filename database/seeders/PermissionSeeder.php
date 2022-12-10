<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'قسم الاختبارات' , 'groupe_id' => 1]);
        Permission::create(['name' => 'قسم المستخدمين' , 'groupe_id' => 2]);
        Permission::create(['name' => 'قسم الصلاحيات' , 'groupe_id' => 3]);
    }
}
