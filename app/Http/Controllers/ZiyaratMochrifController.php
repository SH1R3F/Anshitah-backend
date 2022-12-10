<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ZiyaratMochrif;
use Illuminate\Http\Request;
use PDF;

class ZiyaratMochrifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ziyarat-mochrif.index' , [
            'title' => 'عرض الزيارات',
            'ziyaras' => ZiyaratMochrif::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ziyarat-mochrif.create' , [
            'title' => 'زيارة جديدة',
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
            ],
            'users' => User::all()
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
        $ziyara = new ZiyaratMochrif();
        $ziyara->school = $request->school;
        $ziyara->user_id = $request->user_id;
        $ziyara->date = $request->date;
        $ziyara->q1 = $request->q1 ? true : false;
        $ziyara->q2 = $request->q2 ? true : false;
        $ziyara->q3 = $request->q3 ? true : false;
        $ziyara->q4 = $request->q4 ? true : false;
        $ziyara->q5 = $request->q5 ? true : false;
        $ziyara->q6 = $request->q6 ? true : false;
        $ziyara->q7 = $request->q7 ? true : false;
        $ziyara->q8 = $request->q8 ? true : false;
        $ziyara->q9 = $request->q9 ? true : false;
        $ziyara->q10 = $request->q10 ? true : false;
        $ziyara->q11 = $request->q11 ? true : false;
        $ziyara->q12 = $request->q12 ? true : false;
        $ziyara->q13 = $request->q13 ? true : false;
        $ziyara->save();
        return back()->with('create' , 'تم إنشاء الزيارة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ZiyaratMochrif  $ziyaratMochrif
     * @return \Illuminate\Http\Response
     */
    public function show(ZiyaratMochrif $ziyaratMochrif)
    {
        //
    }

    public function print(ZiyaratMochrif $ziyaratMochrif)
    {
        $data = [
            'data' => $ziyaratMochrif,
            'path' => public_path('assets/media/pdf-print/logo.png')
        ];
        $pdf = PDF::loadView('ziyarat-mochrif.print', $data, [], [
            'format' => 'A3-L',
        ]);
        return $pdf->stream('ziyarat-mochrif' . time() . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ZiyaratMochrif  $ziyaratMochrif
     * @return \Illuminate\Http\Response
     */
    public function edit(ZiyaratMochrif $ziyaratMochrif)
    {
        return view('ziyarat-mochrif.edit' , [
            'title' => 'زيارة جديدة',
            'ziyara' => $ziyaratMochrif,
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
            ],
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ZiyaratMochrif  $ziyaratMochrif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ZiyaratMochrif $ziyaratMochrif)
    {
        $ziyara = $ziyaratMochrif;
        $ziyara->school = $request->school;
        $ziyara->user_id = $request->user_id;
        $ziyara->date = $request->date;
        $ziyara->q1 = $request->q1 ? true : false;
        $ziyara->q2 = $request->q2 ? true : false;
        $ziyara->q3 = $request->q3 ? true : false;
        $ziyara->q4 = $request->q4 ? true : false;
        $ziyara->q5 = $request->q5 ? true : false;
        $ziyara->q6 = $request->q6 ? true : false;
        $ziyara->q7 = $request->q7 ? true : false;
        $ziyara->q8 = $request->q8 ? true : false;
        $ziyara->q9 = $request->q9 ? true : false;
        $ziyara->q10 = $request->q10 ? true : false;
        $ziyara->q11 = $request->q11 ? true : false;
        $ziyara->q12 = $request->q12 ? true : false;
        $ziyara->q13 = $request->q13 ? true : false;
        $ziyara->save();
        return back()->with('create' , 'تم تعديل الزيارة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ZiyaratMochrif  $ziyaratMochrif
     * @return \Illuminate\Http\Response
     */
    public function destroy(ZiyaratMochrif $ziyaratMochrif)
    {
        $ziyaratMochrif->delete();
        return back()->with('delete' , 'تم حذف الزيارة بنجاح');
    }
}
