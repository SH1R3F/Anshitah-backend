<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\GroupePermission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            [
                'name' => 'قسم المشاركات',
                'items' => [
                    'قسم المشاركات',
                    'المشاركات الموافق عليها',
                    'المشاركات غير الموافق عليها',
                ]
            ],
        ];
        foreach($groups as $gp){
            $grp = new GroupePermission();
            $grp->name = $gp['name'];
            $grp->save();
            foreach($gp['items'] as $item){
                $permission = new Permission();
                $permission->name = $item;
                $permission->groupe_id = $grp->id;
                $permission->guard_name = 'web';
                $permission->save();
            }
        }
    }
}
