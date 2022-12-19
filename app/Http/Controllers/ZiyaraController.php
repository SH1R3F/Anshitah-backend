<?php

namespace App\Http\Controllers;

use App\Models\Ziyara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ZiyaraController extends Controller
{

    public function ziyaras()
    {
        return view('ziyaras.index', [
            'title' => 'جدول الزيارات',
            'ziyaras' => Ziyara::all()
        ]);
    }
    public function ziyaraPrint()
    {
        $data = [
            'data' => Ziyara::all(),
            'path' => public_path('assets/media/pdf-print/logo.png')
        ];
        $pdf = PDF::loadView('ziyaras.print', $data, [], [
            'format' => 'A3-L',
        ]);
        return $pdf->stream('ziyarats' . time() . '.pdf');
    }

    // تغيير حالة الأسبوع ظاهر أو مخفي
    public function weekStatus($id)
    {
        $week = Week::findOrFail($id);
        $week->status = !$week->status;
        $week->save();
        $st = $week->status ? 'إظهار' : 'إخفاء';
        $msg = "ثم $st الأسبوع $week->name";
        return redirect()->route('weeks')->with('status', $msg);
    }

    // حذف الأسبوع
    public function ziyaraDelete($id)
    {
        $week = Ziyara::findOrFail($id);
        $msg = "تم حذف الزيارة بنجاح";
        $week->delete();
        return back()->with('delete', $msg);
    }

    // تعديل الأسبوع
    public function ziyaraEdit($id)
    {
        $week = Ziyara::findOrFail($id);
        $names = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس'];
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
        return view('ziyaras.edit', [
            'week' => $week,
            'schools' => $schools,
            'names' => $names,
            'title' => 'تعديل زيارة'
        ]);
    }
    public function ziyaraUpdate(Request $r, $id)
    {
        $week = Ziyara::findOrFail($id);
        $week->date = $r->date;
        $week->q1 = $r->q1;
        $week->q2 = $r->q2;
        $week->q3 = $r->q3;
        $week->q4 = $r->q4;
        $week->q5 = $r->q5;
        $msg = "تم تعديل الزيارة بنجاح";
        $week->save();
        return back()->with('update', $msg);
    }

    // إنشاء الأسبوع
    public function ziyaraCreate()
    {
        $names = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس'];
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
        return view('ziyaras.create', [
            'names' => $names,
            'schools' => $schools,
            'title' => 'إنشاء زيارة'
        ]);
    }
    public function ziyaraStore(Request $r)
    {
        $week = new Ziyara();
        $week->date = $r->date;
        $week->user_id = Auth::user()->id;
        $week->q1 = $r->q1;
        $week->q2 = $r->q2;
        $week->q3 = $r->q3;
        $week->q4 = $r->q4;
        $week->q5 = $r->q5;
        $week->save();
        $msg = "تم إنشاء الزيارة بنجاح";
        return back()->with('create', $msg);
    }

    // حجز حضور
    public function hajzHodor()
    {
        $weeks = Week::where('status', true)->get();
        return view('reservations.hajzhodor', [
            'title' => 'حجز حضور',
            'weeks' => $weeks
        ]);
    }

    public function hajzHodorTable($id)
    {
        $week = Week::findOrFail($id);
        if (!$week->status) abort(404);
        return view('reservations.teacher.table', [
            'title' => 'حجز حضور المعلمين',
            'week' => $week,
            'headings' => [
                'الأيام | الحصة',
                'الأولى في المنصة',
                'الثانية في المنصة',
                'الرابعة في المنصة',
                'الخامسة في المنصة',
                'السابعة في المنصة',
                'الثامنة في المنصة'
            ]
            // 'headings' => [
            //     'الأيام | الحصة',
            //     'الحصة الأولى',
            //     'الحصة الثانية',
            //     'الحصة الثالثة',
            //     'الحصة الرابعة',
            //     'الحصة الخامسة',
            //     'الحصة السابعة',
            //     'الحصة السادسة',
            // ]
        ]);
    }

    public function hajzHodorRequest($id)
    {
        $seance = Seance::findOrFail($id);
        $seance->user_request_id = Auth::user()->id;
        $seance->save();
        $msg = "ثم طلب حجز الحضور بإنتظار الموافقة";
        return back()->with('request', $msg);
    }

    // شاشة المدير
    public function chachatAlModir()
    {
        $weeks = Week::where('status', true)->get();
        return view('reservations.chachatalmodir', [
            'title' => 'شاشة المدير',
            'weeks' => $weeks
        ]);
    }

    public function chachatAlModirTable($id)
    {
        $week = Week::findOrFail($id);
        if (!$week->status) abort(403, 'الأسبوع مخفي');
        return view('reservations.admin.table', [
            'title' => 'شاشة المدير قبول أو رفض الحجوزات',
            'week' => $week,
            'headings' => [
                'الأيام | الحصة',
                'الأولى في المنصة',
                'الثانية في المنصة',
                'الرابعة في المنصة',
                'الخامسة في المنصة',
                'السابعة في المنصة',
                'الثامنة في المنصة'
            ]
            // 'headings' => [
            //     'الأيام | الحصة',
            //     'الحصة الأولى',
            //     'الحصة الثانية',
            //     'الحصة الثالثة',
            //     'الحصة الرابعة',
            //     'الحصة الخامسة',
            //     'الحصة السابعة',
            //     'الحصة الثامنة',
            // ]
        ]);
    }

    // متاح أو غير متاح
    public function status($id)
    {
        $seance = Seance::findOrFail($id);
        $seance->status = !$seance->status;
        $seance->save();
        $msg = "ثم تغيير حالة الحصة";
        return back()->with('status', $msg);
    }

    // قبول الحجز
    public function accept($id)
    {
        $seance = Seance::findOrFail($id);
        $seance->user_id = $seance->user_request_id;
        $seance->user_request_id = null;
        $seance->save();
        $msg = "ثم قبول الحجز";
        return back()->with('accept', $msg);
    }

    // رفض الحجز
    public function deny($id)
    {
        $seance = Seance::findOrFail($id);
        $seance->user_request_id = null;
        $seance->save();
        $msg = "ثم رفض الحجز";
        return back()->with('deny', $msg);
    }

    // إلغاء الحجز
    public function end($id)
    {
        $seance = Seance::findOrFail($id);
        $msg = "ثم إلغاءالحجز للمعلم ";
        $msg .= $seance->user->name;
        $seance->user_id = null;
        $seance->save();
        return back()->with('end', $msg);
    }

    // حجز
    public function hajz(Request $r, $id)
    {
        $seance = Seance::findOrFail($id);
        $seance->user_id = $r->user_id;
        $seance->save();
        $msg = "ثم حجز الحصة للمعلم {$seance->user->name}";
        return back()->with('hajz', $msg);
    }
}
