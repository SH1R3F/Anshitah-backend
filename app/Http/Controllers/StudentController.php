<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\StudentT;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index',[
            'title' => 'إدارة الطلاب',
            'students' => User::role('طالب')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create' , [
            'title' => 'إضافة طالب',
            'levels' => Level::all(),
            'sanawat' => [
                'ثالث ابتدائي',
                'رابع ابتدائي',
                'خامس ابتدائي',
                'سادس ابتدائي',
                'أول متوسط',
                'ثاني متوسط',
                'ثالث متوسط',
                'أول ثانوي',
            ],
            'schools' => [
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
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt(123456),
            'mobile' => $request->mobile,
            'rakm_howiya' => $request->rakm_howiya,
            'city' => $request->city,
            'sexe' => $request->sexe,
            'sana_dirassia' => $request->sana_dirassia,
            'ramz_wizari' => $request->ramz_wizari,
            'school' => $request->school,
            'level_id' => $request->level_id
        ]);
        $user->assignRole('طالب');
        return redirect()->route('students.index')->with('create' , 'ثم إضافة طالب بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('students.edit' ,[
        'title' => 'تعديل طالب',
        'user' => User::findOrFail($id),
        'levels' => Level::all(),
        'sanawat' => [
            'ثالث ابتدائي',
            'رابع ابتدائي',
            'خامس ابتدائي',
            'سادس ابتدائي',
            'أول متوسط',
            'ثاني متوسط',
            'ثالث متوسط',
            'أول ثانوي',
        ],
        'schools' => [
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
        ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->mobile = $request->mobile;
        $user->rakm_howiya = $request->rakm_howiya;
        $user->city = $request->city;
        $user->sexe = $request->sexe;
        $user->sana_dirassia = $request->sana_dirassia;
        $user->ramz_wizari = $request->ramz_wizari;
        $user->school = $request->school;
        $user->level_id = $request->level_id;
        $user->save();
        return redirect()->route('students.index')->with('create' , 'ثم تعديل طالب بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $std = User::findOrFail($id);
        $std->delete();
        return back()->with('delete' , 'تم حذف الطالب بنجاح');
    }

    
}
