<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            'المستوى الاول',
            'المستوى الثاني',
            'المستوى الثالث'
        ];

        foreach($levels as $l){
            $level = new Level();
            $level->name = $l;
            $level->save();
        }
    }
}
