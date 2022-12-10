<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Models\User;
use App\Models\Year;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class ImportController extends Controller
{
    // بيانات الطلاب
    public function importUsers(){
        return view('imports.import',[
            'title' => 'رفع بيانات المستخدمين'
        ]);
    }

    public function storeStudents(Request $r){
        $updated = 0;
        $created = 0;
        $students = Excel::toArray(null,$r->file('file'));
        $students = Arr::where($students[0],function($val,$key){
            return $val[8] != null && $val[8] != 'البريد الإلكتروني';
        });
        foreach($students as $student) {
            if(User::where('email',$student[8])->exists()){
                $s = User::where('email',$student[8])->first();
                $s->name = $student[21];
                $s->email = $student[8];
                $s->save();
                $updated++;
            }else{
                $student = new User([
                    'name' => $student[21],
                    'email' => $student[8],
                    'password' => bcrypt(123456)
                ]);
                $student->save();
                $student->assignRole('معلم');
                $created++;
            }
        }
        $msg = "ثم إضافة $created طالب ";
        $msg .= "ثم تعديل بيانات $updated طالب ";
        return back()->with('status',$msg);
    }

    // بيانات المعلمين
    public function importTeachers(){
        return view('imports.students.import',[
            'title' => 'رفع بيانات الطلاب'
        ]);
    }

    public function storeTeachers(Request $r){
        $students = Excel::toArray(null,$r->file('file'));
        $students = Arr::where($students[0],function($val,$key){
            return $val[8] != null && $val[8] != 'البريد الإلكتروني';
        });
        foreach($students as $student) {
            if(User::where('email',$student[8])->exists()){
                info('Exist');
            }else{
                $student = new User([
                    'name' => $student[21],
                    'email' => $student[8],
                    'password' => bcrypt(123456)
                ]);
                $student->save();
                $student->assignRole('معلم');
            }
        }
        return back()->with('success','ثم رفع بيانات المعلمين');
    }



    // Old one
    // // رفع بيانات الطلاب
    // public function importStudents(Request $req){
    //     ini_set('max_execution_time', 180);
    //     // رفع الملف
    //     $students = Excel::toArray(null,$req->file('file'));
    //     $students = $students[0];
    //     // dd($students);
    //     for($i = 1; $i < count($students) ; $i++){
    //         if(
    //             $students[$i][4] == 'ثالث ابتدائي' ||
    //             $students[$i][4] == 'رابع ابتدائي' ||
    //             $students[$i][4] == 'خامس ابتدائي'
    //         ){
    //             $level = 'مستوى أول';
    //         }
    //         if(
    //             $students[$i][4] == 'سادس ابتدائي' ||
    //             $students[$i][4] == 'أول متوسط' ||
    //             $students[$i][4] == 'ثاني متوسط'
    //         ){
    //             $level = 'مستوى ثاني';
    //         }
    //         if(
    //             $students[$i][4] == 'ثالث متوسط' ||
    //             $students[$i][4] == 'أول ثانوي'
    //         ){
    //             $level = 'مستوى ثالث';
    //         }
    //         $user = User::create([
    //             'name' => $students[$i][1],
    //             'email' => 'student' . $students[$i][0] . '@mail.com',
    //             'mobile' => str_replace(' ' , '' , $students[$i][3]),
    //             'level' => $level,
    //             'password' => bcrypt(123456),
    //             'rakm_howiya' => $students[$i][0],
    //             'city' => $students[$i][6],
    //             'sexe' => $students[$i][2],
    //             'sana_dirassia' => $students[$i][4],
    //             'ramz_wizari' => $students[$i][5],
    //             'school' => $students[$i][7],
    //         ]);
    //         $user->assignRole('طالب');
    //     }
    //     dd('done');
    // }


    // رفع بيانات الطلاب
    public function importStudents(Request $req){
        ini_set('max_execution_time', 180);
        // رفع الملف

        $students = Excel::toCollection(null,$req->file('file'));
        $students = $students[1];
        // dd($students);
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
        foreach ($students as $student){
            if (!is_null($student[2]) && $student[2] != 'الفصل') {
                $year = $years[strval(substr($student[3], 1, 1))];
                $user = [
                    'name' => $student[4],
                    'email' => 'student' . $student[5] . '@mail.com',
                    'mobile' => str_replace(' ' , '' , $student[1]),
                    'password' => bcrypt(123456),
                    'rakm_howiya' => $student[5],
                    'sana_dirassia' => $student[4],
                    'classes' => json_encode([strval($ids[$year]) . '_' . strval($student[2])])
                ];
                $user = User::updateOrCreate(['rakm_howiya' => $student[5], 'email' => 'student' . $student[5] . '@mail.com'], $user);
                $user->assignRole('طالب');
            }
            
        }
        return back()->with('status', 'تم رفع بيانات الطلاب');
    }
}
