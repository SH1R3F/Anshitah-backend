<?php

namespace App\Http\Controllers;

use App\Models\QiasAdaa;
use Illuminate\Http\Request;

class QiasAdaaController extends Controller
{
    // عرض كل الأجندة
    public function index()
    {
        $data = QiasAdaa::all();
        return view('qias-addas.all', [
            'title' => 'قياس الأداء',
            'data' => $data
        ]);
    }

    // إنشاء أجندة
    public function create()
    {
        $schools = [
            'ابتدائية الأندلس',
            'ابتدائية الإمام عاصم لتحفيظ القرآن',
            'ابتدائية الجزيرة',
            'ابتدائية الحويلات',
            'ابتدائية الدانة',
            'ابتدائية الدفي',
            'ابتدائية الرياض',
            'ابتدائية الفناتير',
            'ابتدائية الفيحاء',
            'ابتدائية المرجان',
            'ابتدائية المطرفية',
            'ابتدائية الواحة',
            'ابتدائية جلمودة',
            'ابتدائية حراء',
            'ابتدائية نجد',
            'ابتدائية هجر',
            'ثانوية أم القرى - مقررات',
            'ثانوية الأحساء - مقررات',
            'ثانوية الدفي - مقررات',
            'ثانوية الرواد',
            'ثانوية العلا',
            'ثانوية نجد - مقررات',
            'متوسطة أم القرى',
            'متوسطة الإمام عاصم لتحفيظ القرآن الكريم',
            'متوسطة الخليج',
            'متوسطة الصديق',
            'متوسطة الفاروق',
            'متوسطة المروج',
            'متوسطة نجد'
        ];
        return view('qias-addas.create', [
            'title' => 'إنشاء نشاط',
            'schools' => $schools
        ]);
    }

    public function store(Request $request)
    {
        $data = new QiasAdaa([
           'name' => $request->name,
           'points' => $request->points,
           'cause' => $request->cause,
        ]);
        $data->save();
        $msg = "تم انشاء القياس بنجاح";
        return back()->with('create', $msg);
    }

    public function print($id)
    {
        $data = [
            'data' => TeacherNashat::findOrFail($id),
            'path' => public_path('assets/media/pdf-print/logo.png')
        ];
        $pdf = PDF::loadView('qias-adaas.print', $data, [], [
            'format' => 'A3-L',
        ]);
        return $pdf->stream('plan' . $data['data']->id . '.pdf');
    }

    // تعديل الأجندة
    public function edit($id)
    {
        $schools = [
            'ابتدائية الأندلس',
            'ابتدائية الإمام عاصم لتحفيظ القرآن',
            'ابتدائية الجزيرة',
            'ابتدائية الحويلات',
            'ابتدائية الدانة',
            'ابتدائية الدفي',
            'ابتدائية الرياض',
            'ابتدائية الفناتير',
            'ابتدائية الفيحاء',
            'ابتدائية المرجان',
            'ابتدائية المطرفية',
            'ابتدائية الواحة',
            'ابتدائية جلمودة',
            'ابتدائية حراء',
            'ابتدائية نجد',
            'ابتدائية هجر',
            'ثانوية أم القرى - مقررات',
            'ثانوية الأحساء - مقررات',
            'ثانوية الدفي - مقررات',
            'ثانوية الرواد',
            'ثانوية العلا',
            'ثانوية نجد - مقررات',
            'متوسطة أم القرى',
            'متوسطة الإمام عاصم لتحفيظ القرآن الكريم',
            'متوسطة الخليج',
            'متوسطة الصديق',
            'متوسطة الفاروق',
            'متوسطة المروج',
            'متوسطة نجد'
        ];
        $data = QiasAdaa::findOrFail($id);
        return view(
            'qias-addas.edit',
            [
                'title' => 'تعديل قياس الأداء',
                'data' => $data,
                'schools' => $schools
            ]
        );
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $agenda = QiasAdaa::findOrFail($id);
        $agenda->name = $request->name;
        $agenda->points = $request->points;
        $agenda->cause = $request->cause;
        $agenda->save();
        $msg = "ثم تعديل قياس أداء بنجاح";
        return back()->with('update', $msg);
    }

    // حذف الأجندة
    public function destroy($id)
    {
        $agenda = QiasAdaa::findOrFail($id);
        $agenda->delete();
        $msg = "ثم حذف قياس أداء بنجاح";
        return back()->with('delete', $msg);
    }
}
