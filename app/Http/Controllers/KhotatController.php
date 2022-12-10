<?php

namespace App\Http\Controllers;

use App\Models\Khotat;
use Illuminate\Http\Request;

class KhotatController extends Controller
{

    public function index()
    {
        return view('khotats.index' , [
            'title' => 'الخطط',
            'khotats' => Khotat::all(),
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

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'file' => 'required|file',
            'schools' => 'required'
        ]);

        // if ($request->file) {
        //     $trainingfile = $request->file('file');
        //     $filename     = time() . '-trainingplan.' . $trainingfile->extension();
        //     Storage::disk('public')->putFileAs(
        //         'trainings',
        //         $trainingfile,
        //         $filename
        //     );
        // }

        Khotat::Create([
            'name' => $request->name,
            'file' => $request->file('file')->store('khotats'),
            'schools' => json_encode($request->schools)
        ]);
        return back()->with('create' , 'ثم انشاء الخطة بنجاح');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $khota = Khotat::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'schools' => 'required'
        ]);
        // if ($request->file) {
            // Save the new file
            // $trainingfile = $request->file('file')->store('trainings');
            // $filename     = time() . '-trainingplan.' . $trainingfile->extension();
            // Storage::disk('public')->putFileAs(
            //     'trainings',
            //     $trainingfile,
            //     $filename
            // );

            // // Delete the old file
            // Storage::disk('public')->delete(str_replace(env('STORAGE_PATH'), '', $training->file));
        // }

        // Update database
        $khota->update([
            'name' => $request->name,
            'schools' => json_encode($request->schools),
            'file' => isset($filename) ? $request->file('file')->store('khotats') : $khota->file
        ]);
        return back()->with('create' , 'ثم تعديل الخطة بنجاح');
    }

    public function destroy($id)
    {
        $training = Khotat::findOrFail($id);
        if ($training->delete()) {
            return back()->with('create' , 'ثم حذف الخطة بنجاح');
        }
    }

}
