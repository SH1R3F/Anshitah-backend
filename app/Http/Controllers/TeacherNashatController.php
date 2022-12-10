<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\TeacherNashat;
use App\Models\User;
use PDF;
class TeacherNashatController extends Controller
{
     // عرض كل الأجندة
     public function index()
     {
         $data = TeacherNashat::all();
         return view('teacher-nashats.all', [
             'title' => 'نشاطات المعلمين',
             'data' => $data
         ]);
     }

     // إنشاء أجندة
     public function create()
     {
         $users   = User::role('مشرفي النشاط')->get();
         $members = User::role('مشرفي النشاط')->get();
         $mokaririn = User::role('مشرفي النشاط')->get();
         $equipes = [
             'الربوت',
             'الحاسب الآلي'
         ];
         return view('teacher-nashats.create', [
             'title' => 'إنشاء نشاط',
             'users' => $users,
             'equipes' => $equipes,
             'members' => $members,
             'mokaririn' => $mokaririn,
         ]);
     }

     public function store(Request $request)
     {
        $nadi_3ilmi = [
            'mochrif' => $request->mochrif1,
            'data' => $request->data1
        ];
        $nadi_taqafi = [
            'mochrif' => $request->mochrif2,
            'data' => $request->data2
        ];
        $nadi_tafkir = [
            'mochrif' => $request->mochrif3,
            'data' => $request->data3
        ];
        $nadi_tatawo3 = [
            'mochrif' => $request->mochrif4,
            'data' => $request->data4
        ];
        $nadi_mihani = [
            'mochrif' => $request->mochrif5,
            'data' => $request->data5
        ];
        $nadi_sport = [
            'mochrif' => $request->mochrif6,
            'data' => $request->data6
        ];
        $nadi_kachfi = [
            'mochrif' => $request->mochrif7,
            'data' => $request->data7
        ];
        $nadi_ijtima3i = [
            'mochrif' => $request->mochrif8,
            'data' => $request->data8
        ];
        $nadi_tadrib = [
            'mochrif' => $request->mochrif9,
            'data' => $request->data9
        ];
         $data = new TeacherNashat([
            // 'raid' => $request->raid,
            // 'modir' => $request->modir,
            'raid' => 'رائد',
            'modir' => 'مدير',
            'nadi_3ilmi' => json_encode($nadi_3ilmi),
            'nadi_taqafi' => json_encode($nadi_taqafi),
            'nadi_tafkir' => json_encode($nadi_tafkir),
            'nadi_tatawo3' => json_encode($nadi_tatawo3),
            'nadi_mihani' => json_encode($nadi_mihani),
            'nadi_sport' => json_encode($nadi_sport),
            'nadi_kachfi' => json_encode($nadi_kachfi),
            'nadi_ijtima3i' => json_encode($nadi_ijtima3i),
            'nadi_tadrib' => json_encode($nadi_tadrib),
         ]);
         $data->save();
         $msg = "تم انشاء النشاط بنجاح";
         return back()->with('create', $msg);
     }

     public function print($id)
     {
         $data = [
             'data' => TeacherNashat::findOrFail($id),
             'path' => public_path('assets/media/pdf-print/logo.png')
         ];
         $pdf = PDF::loadView('teacher-nashats.print', $data, [], [
             'format' => 'A3-L',
         ]);
         return $pdf->stream('plan' . $data['data']->id . '.pdf');
     }

     // تعديل الأجندة
     public function edit($id)
     {
         $data = TeacherNashat::findOrFail($id);
         dd($data);
         return view(
             'agendas.edit',
             [
                 'title' => 'تعديل الأجندة',
                 'agenda' => $agenda
             ]
         );
     }
     public function update(Request $request, $id)
     {
         // dd($request->all());
         $agenda = TeacherNashat::findOrFail($id);
         $agenda->name = $request->name;
         $agenda->date_begin = $request->date_begin;
         $agenda->date_end = $request->date_end;
         $agenda->save();
         $msg = "ثم تعديل الأجندة بنجاح";
         return back()->with('update', $msg);
     }

     // حذف الأجندة
     public function destroy($id)
     {
         $agenda = TeacherNashat::findOrFail($id);
         $agenda->delete();
         $msg = "ثم حذف النشاط بنجاح";
         return back()->with('delete', $msg);
     }
}
