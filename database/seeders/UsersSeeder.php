<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // المدير
        $user = new User();
        $user->name  = "مدير موقع موهبة";
        $user->email = "admin@mail.com";
        $user->password = bcrypt(123456);
        $user->save();
        $user->assignRole('مدير');

        // طالب
        $user = new User();
        $user->name  = "طالب تجريبي";
        $user->email = "std1@mail.com";
        $user->password = bcrypt(123456);
        $user->level_id = 1;
        $user->save();
        $user->assignRole('طالب');
    }
}
