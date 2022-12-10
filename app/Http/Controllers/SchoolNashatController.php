<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SchoolNashat;
use Illuminate\Http\Request;
use PDF;
class SchoolNashatController extends Controller
{
     // عرض كل الأجندة
     public function index()
     {
         $data = SchoolNashat::all();
         return view('school-nashats.all', [
             'title' => 'مجلس النشاط المدرسي',
             'data' => $data
         ]);
     }

     // إنشاء أجندة
     public function create()
     {
         $users   = User::all();
         return view('school-nashats.create', [
             'title' => 'إنشاء نشاط مدرسي',
             'users' => $users
         ]);
     }

     public function store(Request $request)
     {
         SchoolNashat::create([
             'name' => $request->name,
             'work' => $request->work,
             'task' => $request->task
         ]);
         $msg = "تم انشاء النشاط المدرسي بنجاح";
         return back()->with('create', $msg);
     }

     public function print()
     {
         $data = [
             'data' => SchoolNashat::all(),
             'path' => public_path('assets/media/pdf-print/logo.png')
         ];
         $pdf = PDF::loadView('school-nashats.print', $data, [], [
             'format' => 'A3-L',
         ]);
         return $pdf->stream('school-nashat' . time() . '.pdf');
     }

     // تعديل الأجندة
     public function edit($id)
     {
         $users   = User::all();
         $data = SchoolNashat::findOrFail($id);
         return view(
             'school-nashats.edit',
             [
                 'title' => 'تعديل نشاطات المدرسية',
                 'data' => $data,
                 'users' => $users
             ]
         );
     }
     public function update(Request $request, $id)
     {

         $agenda = SchoolNashat::findOrFail($id);
         $agenda->name = $request->name;
         $agenda->work = $request->work;
         $agenda->task = $request->task;
         $agenda->save();
         $msg = "ثم تعديل النشاط المدرسي بنجاح";
         return back()->with('update', $msg);
     }

     // حذف الأجندة
     public function destroy($id)
     {
         $agenda = SchoolNashat::findOrFail($id);
         $agenda->delete();
         $msg = "ثم حذف النشاط المدرسي بنجاح";
         return back()->with('delete', $msg);
     }
}
