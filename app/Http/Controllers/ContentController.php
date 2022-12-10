<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{

    public function index()
    {
        return view('online-content.index' , [
            'title' => 'المحتوى الإلكتروني',
            'content' => Content::all()
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'file' => 'required|file'
        ]);



        Content::Create([
            'name' => $request->name,
            'file' => $request->file->store('istibianat'),
        ]);
        return back()->with('create' , 'ثم انشاء المادة بنجاح');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $subject = Content::findOrFail($id);
        $this->validate($request, [
            'name' => 'required'
        ]);

        // Update database
        $subject->update([
            'name' => $request->name,
            'file' => isset($filename) ? $request->file->store('istibianat') : $subject->file,
        ]);
        return back()->with('create' , 'ثم تعديل المادة بنجاح');
    }

    public function destroy($id)
    {
        $subject = Content::findOrFail($id);
        if ($subject->delete()) {
            return back()->with('create' , 'ثم حذف المادة بنجاح');
        }
    }

    public function users_index()
    {
        return view('online-content.users.index', [
            'title' => 'المحتوى الإلكتروني',
            'content' => Content::latest()->get()
        ]);
    }

}
