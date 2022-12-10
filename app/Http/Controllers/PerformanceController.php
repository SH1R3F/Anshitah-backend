<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PerformanceController extends Controller
{

    public function index()
    {
        return view('performance.index' , [
            'title' => 'قياس الأداء'
        ]);
    }

    // public function create(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'file' => 'required|file'
    //     ]);
        
    //     if ($request->file) {
    //         $subjectfile = $request->file('file');
    //         $filename     = time() . '-onlinecontent.' . $subjectfile->extension();
    //         Storage::disk('public')->putFileAs(
    //             'online-content',
    //             $subjectfile,
    //             $filename
    //         );
    //     }
    
    //     Content::Create([
    //         'name' => $request->name,
    //         'file' => env('STORAGE_PATH') . 'online-content/' . $filename,
    //     ]);
    //     return back()->with('create' , 'ثم انشاء المادة بنجاح');
    // }

    // public function update(Request $request, $id)
    // {
    //     $subject = Content::findOrFail($id);
    //     $this->validate($request, [
    //         'name' => 'required'
    //     ]);
    //     if ($request->file) {
    //         // Save the new file
    //         $subjectfile = $request->file('file');
    //         $filename     = time() . '-onlinecontent.' . $subjectfile->extension();
    //         Storage::disk('public')->putFileAs(
    //             'online-content',
    //             $subjectfile,
    //             $filename
    //         );

    //         // Delete the old file
    //         Storage::disk('public')->delete(str_replace(env('STORAGE_PATH'), '', $subject->file));
    //     }

    //     // Update database
    //     $subject->update([
    //         'name' => $request->name,
    //         'file' => isset($filename) ? env('STORAGE_PATH') . 'online-content/' . $filename : $subject->file,
    //     ]);
    //     return back()->with('create' , 'ثم تعديل المادة بنجاح');
    // }

    // public function destroy($id)
    // {
    //     $subject = Content::findOrFail($id);
    //     if ($subject->delete()) {
    //         return back()->with('create' , 'ثم حذف المادة بنجاح');
    //     }
    // }

}