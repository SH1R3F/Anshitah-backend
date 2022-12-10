<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{

    public function index()
    {
        return view('trainings.index' , [
            'title' => 'التدريب والتطوير',
            'trainings' => Training::all()
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'file' => 'required|file'
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

        Training::Create([
            'name' => $request->name,
            'file' => $request->file('file')->store('trainings'),
        ]);
        return back()->with('create' , 'ثم انشاء الخطة بنجاح');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $training = Training::findOrFail($id);
        $this->validate($request, [
            'name' => 'required'
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
        $training->update([
            'name' => $request->name,
            'file' => isset($filename) ? $request->file('file')->store('trainings') : $training->file
        ]);
        return back()->with('create' , 'ثم تعديل الخطة بنجاح');
    }

    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        if ($training->delete()) {
            return back()->with('create' , 'ثم حذف الخطة بنجاح');
        }
    }

}
