<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class YearController extends Controller
{

    public function index()
    {
        return view('years.index' , [
            'title' => 'إدارة الصفوف',
            'years' => Year::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required|unique:years',
            'number'  => 'required|integer',
            'classes' => 'required'
        ]);

        Year::create([
            'name'    => $request->name,
            'number'  => $request->number,
            'classes' => json_encode(explode(',', $request->classes)),
        ]);
        return back()->with('create' , 'ثم انشاء الصف بنجاح');
    }
    
    public function update(Request $request)
    {
        $id = $request->id;
        $year = Year::findOrFail($id);
        $this->validate($request, [
            'name'    => 'required|unique:years,name,' . $year->id,
            'number'  => 'required|integer',
            'classes' => 'required'
        ]);

        $year->update([
            'name'    => $request->name,
            'number'  => $request->number,
            'classes' => json_encode(explode(',', $request->classes)),
        ]);
        return back()->with('create' , 'ثم تعديل الصف بنجاح');
    }

    public function destroy($id)
    {
        $year = Year::findOrFail($id);
        if ($year->delete()) {
            return back()->with('create' , 'ثم حذف الصف بنجاح');
        }
    }

}