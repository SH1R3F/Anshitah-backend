<?php

namespace Database\Seeders;

use App\Models\GroupePermission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class GroupePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groupes = [
            'الاختبارات',
            'المستخدمين',
            'الصلاحيات',
        ];
        foreach($groupes as $groupe){
            $grp = new GroupePermission();
            $grp->name = $groupe;
            $grp->save();
        }
    }
}
