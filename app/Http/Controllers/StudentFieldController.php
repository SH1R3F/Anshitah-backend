<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\StudentField;
use Illuminate\Http\Request;

class StudentFieldController extends Controller
{
    // عرض كل الأجندة
    public function index()
    {
        $data = StudentField::all();
        return view('student-fields.all', [
            'title' => 'نشاطات الطلاب',
            'data' => $data
        ]);
    }

    // إنشاء أجندة
    public function create()
    {
        $students   = User::role('طالب')->get();
        $fosol = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $sofof = [
            'الأول ابتدائي',
            'الثاني ابتدائي',
            'الثالث ابتدائي',
            'الرابع ابتدائي',
            'الخامس ابتدائي',
            'السادس ابتدائي',
            'الأول متوسط',
            'الثاني متوسط',
            'الثالث متوسط',
            'الأول ثانوي',
            'الثاني ثانوي',
            'الثالث ثانوي'
        ];
        $majals = [
            'الربوت',
            'الحاسب الآلي'
        ];
        return view('student-fields.create', [
            'title' => 'إنشاء نشاط',
            'students' => $students,
            'fosol' => $fosol,
            'sofof' => $sofof,
            'majals' => $majals,
        ]);
    }

    public function store(Request $request)
    {
        StudentField::create([
            'name' => $request->name,
            'saf' => $request->saf,
            'fasle' => $request->fasle,
            'majal' => $request->majal,
        ]);
        $msg = "تم انشاء النشاط بنجاح";
        return back()->with('create', $msg);
    }

    public function print($id)
    {
        $data = [
            'data' => TeacherNashat::findOrFail($id),
            'path' => public_path('assets/media/pdf-print/logo.png')
        ];
        $pdf = PDF::loadView('student-fields.print', $data, [], [
            'format' => 'A3-L',
        ]);
        return $pdf->stream('plan' . $data['data']->id . '.pdf');
    }

    // تعديل الأجندة
    public function edit($id)
    {
        $students   = User::role('طالب')->get();
        $fosol = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $sofof = [
            'الأول ابتدائي',
            'الثاني ابتدائي',
            'الثالث ابتدائي',
            'الرابع ابتدائي',
            'الخامس ابتدائي',
            'السادس ابتدائي',
            'الأول متوسط',
            'الثاني متوسط',
            'الثالث متوسط',
            'الأول ثانوي',
            'الثاني ثانوي',
            'الثالث ثانوي'
        ];
        $majals = [
            'الربوت',
            'الحاسب الآلي'
        ];
        $data = StudentField::findOrFail($id);
        return view(
            'student-fields.edit',
            [
                'title' => 'تعديل نشاطات الطلاب',
                'data' => $data,
                'students' => $students,
                'fosol' => $fosol,
                'sofof' => $sofof,
                'majals' => $majals,
            ]
        );
    }
    public function update(Request $request, $id)
    {

        $agenda = StudentField::findOrFail($id);
        $agenda->name = $request->name;
        $agenda->saf = $request->saf;
        $agenda->fasle = $request->fasle;
        $agenda->majal = $request->majal;
        $agenda->save();
        $msg = "ثم تعديل النشاط بنجاح";
        return back()->with('update', $msg);
    }

    // حذف الأجندة
    public function destroy($id)
    {
        $agenda = StudentField::findOrFail($id);
        $agenda->delete();
        $msg = "ثم حذف النشاط بنجاح";
        return back()->with('delete', $msg);
    }
}
