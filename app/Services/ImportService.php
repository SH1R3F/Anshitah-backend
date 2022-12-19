<?php


namespace App\Services;

use App\Imports\StudentsImport;
use App\Models\User;
use App\Models\Year;
use Maatwebsite\Excel\Facades\Excel;

class ImportService
{

    public function import($type, $file)
    {
        if ($type == 'students') {
            Excel::import(new StudentsImport, $file);
            return true;
            //$this->importStudents($file);
        }
    }


    public function importStudents($file)
    {
        $students = Excel::toCollection(null, $file);
        $students = $students[1];
        $years = [
            '1'  => 'الأول الإبتدائي',
            '2'  => 'الثاني الإبتدائي',
            '3'  => 'الثالث الإبتدائي',
            '4'  => 'الرابع الإبتدائي',
            '5'  => 'الخامس الإبتدائي',
            '6'  => 'السادس الإبتدائي',
            '7'  => 'الأول متوسط',
            '8'  => 'الثاني متوسط',
            '9'  => 'الثالث متوسط',
            '10' => 'الأول ثانوي',
            '11' => 'الثاني ثانوي',
            '12' => 'الثالث ثانوي'
        ];
        $ids = [];
        foreach (Year::all('id', 'name') as $year) {
            $ids[$year->name] = strval($year->id);
        }
        foreach ($students as $student) {
            if (!is_null($student[2]) && $student[2] != 'الفصل') {
                $year = $years[strval(substr($student[3], 1, 1))];
                $user = [
                    'name'          => $student[4],
                    'email'         => 'student' . $student[5] . '@mail.com',
                    'mobile'        => str_replace(' ', '', $student[1]),
                    'password'      => bcrypt(123456),
                    'rakm_howiya'   => $student[5],
                    'sana_dirassia' => $student[4],
                    'classes'       => json_encode([strval($ids[$year]) . '_' . strval($student[2])])
                ];
                $user = User::updateOrCreate(['rakm_howiya' => $student[5], 'email' => 'student' . $student[5] . '@mail.com'], $user);
                $user->assignRole('طالب');
            }
        }
    }
}
