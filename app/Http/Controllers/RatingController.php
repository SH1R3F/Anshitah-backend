<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Groupe;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RatingController extends Controller
{
    // عرض كل الزيارات
    public function all(){
        $ratings = Rating::all();
        return view('ratings.all',[
            'title' => 'كل الزيارات',
            'ratings' => $ratings
        ]);
    }

    // عرض الزيارات الخاصة بي
    public function my(){
        $ratings = Rating::where('visitor_id',Auth::user()->id)->get();
        return view('ratings.all',[
            'title' => 'زياراتي',
            'ratings' => $ratings
        ]);
    }

    // إنشاء زيارة
    public function create(){
        $teachers = User::role('معلم')->get();
        $grades = ['ممتاز','جيد جدًا','جيد','مقبول','ضعيف'];
        $seances = [
            'الأولى في المنصة',
            'الثانية في المنصة',
            'الرابعة في المنصة',
            'الخامسة في المنصة',
            'السابعة في المنصة',
            'الثامنة في المنصة'
        ];
        $takhasosat = [
            'التربية الإسلامية',
            'اللغة العربية',
            'الرياضيات',
            'العلوم',
            'الصفوف الأولية',
            'اللغة الإنجليزية',
            'الحاسب الألي',
            'الإجتماعيات',
            'التربية البدنية',
            'التربية الفنية'
        ];
        $mawad = [
            'القرآن الكريم',
            'توحيد',
            'حديث',
            'فقه',
            'لغتي',
            'رياضيات',
            'علوم',
            'إنجليزي',
            'إجتماعيات',
            'حاسب آلي',
            'تربية بدنية',
            'تربية فنية'
        ];
        return view('ratings.create',[
            'title' => 'إنشاء زيارة',
            'teachers' => $teachers,
            'grades' => $grades,
            'seances' => $seances,
            'takhasosat' => $takhasosat,
            'mawad' => $mawad,
            'classes' => Classe::all(), //الصفوف
            'groupes' => Groupe::all(), //الفصول
        ]);
    }
    public function store(Request $r){
        // dd($r->date);
        $rating = new Rating();
        $rating->visitor_id = auth()->user()->id;
        $rating->teacher_id = $r->teacher_id;
        $rating->visitor = User::findOrFail(auth()->user()->id)->name;
        $rating->teacher = User::findOrFail($r->teacher_id)->name;
        $rating->takhasos = $r->takhasos;
        $rating->madat_tadriss = $r->madat_tadriss;
        $rating->course_title = $r->course_title;
        $rating->seance_title = $r->seance_title;
        $rating->date = $r->date;
        $rating->q1 = $r->q1;
        $rating->q2 = $r->q2;
        $rating->q3 = $r->q3;
        $rating->q4 = $r->q4;
        $rating->q5 = $r->q5;
        $rating->q6 = $r->q6;
        $rating->q7 = $r->q7;
        $rating->q8 = $r->q8;
        $rating->q9 = $r->q9;
        $rating->al_saf = $r->al_saf;
        $rating->al_fasle = $r->al_fasle;
        $rating->save();
        $msg = "ثم إنشاء الزيارة بنجاح";
        return back()->with('create',$msg);
    }

    // تعديل زيارة
    public function edit($id){
        $rating = Rating::findOrFail($id);
        $user = Auth::user();
        if($user->id != $rating->visitor_id && !$user->hasRole('مدير'))
            return abort(403,'غير مرخص لك بتعديل زيارة غير خاصة بك');
        $teachers = User::role('معلم')->get();
        $grades = ['ممتاز','جيد جدًا','جيد','مقبول','ضعيف'];
        $seances = [
            'الأولى في المنصة',
            'الثانية في المنصة',
            'الرابعة في المنصة',
            'الخامسة في المنصة',
            'السابعة في المنصة',
            'الثامنة في المنصة'
        ];
        $takhasosat = [
            'التربية الإسلامية',
            'اللغة العربية',
            'الرياضيات',
            'العلوم',
            'الصفوف الأولية',
            'اللغة الإنجليزية',
            'الحاسب الألي',
            'الإجتماعيات',
            'التربية البدنية',
            'التربية الفنية'
        ];
        $mawad = [
            'القرآن الكريم',
            'توحيد',
            'حديث',
            'فقه',
            'لغتي',
            'رياضيات',
            'علوم',
            'إنجليزي',
            'إجتماعيات',
            'حاسب آلي',
            'تربية بدنية',
            'تربية فنية'
        ];
        return view('ratings.edit',[
            'title' => 'تعديل زيارة',
            'rating' => $rating,
            'teachers' => $teachers,
            'grades' => $grades,
            'seances' => $seances,
            'takhasosat' => $takhasosat,
            'mawad' => $mawad,
            'classes' => Classe::all(), //الصفوف
            'groupes' => Groupe::all(), //الفصول
        ]);
    }
    public function update(Request $r , $id){
        $rating = Rating::findOrFail($id);
        $rating->teacher_id = $r->teacher_id;
        $rating->teacher = User::findOrFail($r->teacher_id)->name;
        $rating->takhasos = $r->takhasos;
        $rating->madat_tadriss = $r->madat_tadriss;
        $rating->course_title = $r->course_title;
        $rating->seance_title = $r->seance_title;
        $rating->date = $r->date;
        $rating->q1 = $r->q1;
        $rating->q2 = $r->q2;
        $rating->q3 = $r->q3;
        $rating->q4 = $r->q4;
        $rating->q5 = $r->q5;
        $rating->q6 = $r->q6;
        $rating->q7 = $r->q7;
        $rating->q8 = $r->q8;
        $rating->q9 = $r->q9;
        $rating->al_saf = $r->al_saf;
        $rating->al_fasle = $r->al_fasle;
        $rating->save();
        $msg = "ثم تعديل الزيارة بنجاح";
        return back()->with('update',$msg);
    }

    // عرض الزيارة
    public function show($id){
        $rating = Rating::findOrFail($id);
        return view('ratings.show',[
            'title' => 'عرض الزيارة',
            'rating' => $rating
        ]);
    }

    // عرض زيارات المعلم
    public function ratingsTeacher(){
        $ratings = Rating::where('teacher_id',Auth::user()->id)->get();
        return view('ratings.ratingsteacher',[
            'title' => 'زياراتي',
            'ratings' => $ratings
        ]);
    }
    // عرض الزيارة للمعلم
    public function showTeacher($id){
        $rating = Rating::findOrFail($id);
        return view('ratings.showratingteacher',[
            'title' => 'عرض الزيارة',
            'rating' => $rating
        ]);
    }

    // حذف الزيارة
    public function delete($id){
        $rating = Rating::findOrFail($id);
        $rating->delete();
        $msg = "ثم حذف الزيارة";
        return back()->with('delete',$msg);
    }

    // إظهار أو إخفاء الزيارة عن المعلم
    public function status($id){
        $rating = Rating::findOrFail($id);
        $rating->status = !$rating->status;
        $rating->save();
        $msg = "ثم إخفاء الزيارة";
        if($rating->status)
            $msg = "ثم إظهار الزيارة";
        return back()->with('status',$msg);
    }
}
