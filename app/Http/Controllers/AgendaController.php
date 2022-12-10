<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PDF;

class AgendaController extends Controller
{
    // عرض كل الأجندة
    public function index()
    {
        $agendas = Agenda::all();
        return view('agendas.all', [
            'title' => 'كل الأجندة',
            'agendas' => $agendas
        ]);
    }

    // إنشاء أجندة
    public function create()
    {
        return view('agendas.create', [
            'title' => 'إنشاء أجندة'
        ]);
    }

    public function store(Request $request)
    {
        $agenda = new Agenda([
            'name' => $request->name,
            'date_begin' => $request->date_begin,
            'date_end' => $request->date_end,
        ]);
        $agenda->save();
        $msg = "ثم إنشاء الأجندة بنجاح";
        return back()->with('create', $msg);
    }

    // تعديل الأجندة
    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view(
            'agendas.edit',
            [
                'title' => 'تعديل الأجندة',
                'agenda' => $agenda
            ]
        );
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $agenda = Agenda::findOrFail($id);
        $agenda->name = $request->name;
        $agenda->date_begin = $request->date_begin;
        $agenda->date_end = $request->date_end;
        $agenda->save();
        $msg = "ثم تعديل الأجندة بنجاح";
        return back()->with('update', $msg);
    }

    // حذف الأجندة
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();
        $msg = "ثم حذف الأجندة";
        return back()->with('delete', $msg);
    }
}
