<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Year;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow, SkipsEmptyRows, SkipsOnError, WithCalculatedFormulas
{

    use SkipsErrors;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $year = Year::where('name', $row['alsf'])->first();
        if (!$year) $classes = [];

        $classes = ["{$year->id}_{$row['alfsl']}"]; //id_class
        $user =  new User([
            'name'  => $row['asm_altalb'],
            'email' => Str::slug($row['asm_altalb']) . '@mail.com',
            'rakm_howiya'  => $row['rkm_alhoy'],
            'school'  => $row['almdrs'],
            'classes' => json_encode($classes),
            'password' => bcrypt('123456')
        ]);
        $user->assignRole('طالب');

        return $user;
    }
}
