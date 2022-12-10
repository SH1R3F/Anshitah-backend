<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Seance;
use App\Models\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // عرض كل الأسابيع
    public function weeks() {
        return view('reservations.weeks.index',[
            'title' => 'إدارة الأسابيع',
            'weeks' => Week::all()
        ]);
    }

    // تغيير حالة الأسبوع ظاهر أو مخفي
    public function weekStatus($id) {
        $week = Week::findOrFail($id);
        $week->status = !$week->status;
        $week->save();
        $st = $week->status ? 'إظهار' : 'إخفاء';
        $msg = "ثم $st الأسبوع $week->name";
        return redirect()->route('weeks')->with('status',$msg);
    }

    // حذف الأسبوع
    public function weekDelete($id) {
        $week = Week::findOrFail($id);
        $msg = "ثم حذف الأسبوع $week->name";
        $week->delete();
        return redirect()->route('weeks')->with('delete',$msg);
    }

    // تعديل الأسبوع
    public function weekEdit($id){
        $week = Week::findOrFail($id);
        $days = $week->days;
        $names = ['الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس'];
        return view('reservations.weeks.edit',[
            'week' => $week,
            'days' => $days,
            'names' => $names,
            'title' => 'تعديل أسبوع'
        ]);
    }
    public function weekUpdate(Request $r , $id){
        $week = Week::findOrFail($id);
        $week->name = $r->name;
        $msg = "ثم تعديل الأسبوع $week->name";
        $week->save();
        $names = $r->names;
        $dates = $r->dates;
        $days  = Day::where('week_id',$week->id)->get();
        for($i=0;$i<count($days);$i++){
            $days[$i]->name = $names[$i];
            $days[$i]->date = $dates[$i];
            $days[$i]->save();
        }
        return redirect()->route('weeks')->with('update',$msg);
    }

    // إنشاء الأسبوع
    public function weekCreate(){
        $names = ['الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس'];
        return view('reservations.weeks.create',[
            'names' => $names,
            'title' => 'إنشاء أسبوع'
        ]);
    }
    public function weekStore(Request $r){
        $week = new Week();
        $week->name = $r->name;
        $msg = " ثم إنشاء الأسبوع $week->name ";
        $week->save();
        $names = $r->names;
        $dates = $r->dates;
        for($i=0;$i<count($names);$i++){
            $day = new Day();
            $day->name = $names[$i];
            $day->date = $dates[$i];
            $day->week_id = $week->id;
            $day->save();
        }
        $days = Day::where('week_id',$week->id)->get();
        for($i=0;$i<count($days);$i++){
            for($j=0;$j<6;$j++){
            // for($j=0;$j<7;$j++){
                $seance = new Seance();
                $seance->day_id = $days[$i]->id;
                $seance->save();
            }
        }
        return redirect()->route('weeks')->with('create',$msg);
    }

    // حجز حضور
    public function hajzHodor() {
        $weeks = Week::where('status',true)->get();
         return view('reservations.hajzhodor',[
            'title' => 'حجز حضور',
            'weeks' => $weeks
        ]);
    }

    public function hajzHodorTable($id) {
        $week = Week::findOrFail($id);
        if(!$week->status) abort(404);
        return view('reservations.teacher.table',[
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

    public function hajzHodorRequest($id) {
        $seance = Seance::findOrFail($id);
        $seance->user_request_id = Auth::user()->id;
        $seance->save();
        $msg = "ثم طلب حجز الحضور بإنتظار الموافقة";
        return back()->with('request',$msg);
    }

    // شاشة المدير
    public function chachatAlModir() {
        $weeks = Week::where('status',true)->get();
         return view('reservations.chachatalmodir',[
            'title' => 'شاشة المدير',
            'weeks' => $weeks
        ]);
    }

    public function chachatAlModirTable($id) {
        $week = Week::findOrFail($id);
        if(!$week->status) abort(403,'الأسبوع مخفي');
        return view('reservations.admin.table',[
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
    public function status($id) {
        $seance = Seance::findOrFail($id);
        $seance->status = !$seance->status;
        $seance->save();
        $msg = "ثم تغيير حالة الحصة";
        return back()->with('status',$msg);
    }

    // قبول الحجز
    public function accept($id) {
        $seance = Seance::findOrFail($id);
        $seance->user_id = $seance->user_request_id;
        $seance->user_request_id = null;
        $seance->save();
        $msg = "ثم قبول الحجز";
        return back()->with('accept',$msg);
    }

    // رفض الحجز
    public function deny($id) {
        $seance = Seance::findOrFail($id);
        $seance->user_request_id = null;
        $seance->save();
        $msg = "ثم رفض الحجز";
        return back()->with('deny',$msg);
    }

    // إلغاء الحجز
    public function end($id) {
        $seance = Seance::findOrFail($id);
        $msg = "ثم إلغاءالحجز للمعلم ";
        $msg .= $seance->user->name;
        $seance->user_id = null;
        $seance->save();
        return back()->with('end',$msg);
    }

    // حجز
    public function hajz(Request $r , $id){
        $seance = Seance::findOrFail($id);
        $seance->user_id = $r->user_id;
        $seance->save();
        $msg = "ثم حجز الحصة للمعلم {$seance->user->name}";
        return back()->with('hajz',$msg);
    }
}
