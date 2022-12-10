<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class QuestionnaireController extends Controller
{

    public function index()
    {
        return view('questionnaire.index' , [
            'title' => 'المحتوى الإلكتروني',
            'questionnaires' => Questionnaire::all()
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'file' => 'required_if:path,null'
        ]);
        $q = Questionnaire::Create([
            'name' => $request->name,
            'path' => $request->path,
            'file' => $request->hasFile('file') ? $request->file->store('questionnaire') : ''
        ]);
        // if($request->hasFile('file')){
        //     $q->file = $request->file->store('questionnaire');
        //     $q->save();
        // }
        return back()->with('create' , 'ثم انشاء الإستبيان بنجاح');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $subject = Questionnaire::findOrFail($id);
        $this->validate($request, [
            'name' => 'required'
        ]);
        // Update database
        $subject->update([
            'name' => $request->name,
            'path' => $request->path,
        ]);
        if ($request->file) {
            $filename     = $request->file->store('questionnaire');
            $subject->file = $filename;
            $subject->save();
        }

        return back()->with('create' , 'ثم تعديل الإستبيان بنجاح');
    }

    public function destroy($id)
    {
        $subject = Questionnaire::findOrFail($id);
        if ($subject->delete()) {
            return back()->with('create' , 'ثم حذف الإستبيان بنجاح');
        }
    }

}
