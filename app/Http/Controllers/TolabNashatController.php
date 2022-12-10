<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TolabNashat;
use Illuminate\Http\Request;
use PDF;
class TolabNashatController extends Controller
{
     // عرض كل الأجندة
     public function index()
     {
         $data = TolabNashat::all();
         return view('tolab-nashats.all', [
             'title' => 'مجلس النشاط الطلابي',
             'data' => $data
         ]);
     }

     // إنشاء أجندة
     public function create()
     {
         $users   = User::all();
         return view('tolab-nashats.create', [
             'title' => 'إنشاء نشاط طلابي',
             'users' => $users
         ]);
     }

     public function store(Request $request)
     {
         TolabNashat::create([
             'name' => $request->name,
             'work' => $request->work,
             'note' => $request->note
         ]);
         $msg = "تم انشاء النشاط الطلابي بنجاح";
         return back()->with('create', $msg);
     }

     public function print()
     {
        $data = [
            'data' => TolabNashat::all(),
            'path' => public_path('assets/media/pdf-print/logo.png')
        ];
        $pdf = PDF::loadView('tolab-nashats.print', $data, [], [
            'format' => 'A3-L',
        ]);
        return $pdf->stream('school-nashat' . time() . '.pdf');
     }

     // تعديل الأجندة
     public function edit($id)
     {
         $users   = User::all();
         $data = TolabNashat::findOrFail($id);
         return view(
             'tolab-nashats.edit',
             [
                 'title' => 'تعديل نشاطات الطلابية',
                 'data' => $data,
                 'users' => $users
             ]
         );
     }
     public function update(Request $request, $id)
     {

         $agenda = TolabNashat::findOrFail($id);
         $agenda->name = $request->name;
         $agenda->work = $request->work;
         $agenda->note = $request->note;
         $agenda->save();
         $msg = "ثم تعديل النشاط الطلابي بنجاح";
         return back()->with('update', $msg);
     }

     // حذف الأجندة
     public function destroy($id)
     {
         $agenda = TolabNashat::findOrFail($id);
         $agenda->delete();
         $msg = "ثم حذف النشاط الطلابي بنجاح";
         return back()->with('delete', $msg);
     }
}
