<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use PDF;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\MonthlyReport;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('مدير'))
        $reports = Report::all();
        else
        $reports = Report::where('field' , Auth::user()->field)->get();

        $title = "عرض كل التقارير";
        return view('reports.index', compact('reports', 'title'));
    }

    public function create()
    {
        return view('reports.create', [
            'title' => 'انشاء تقرير',
        ]);
    }

    public function store(Request $request)
    {
        $storagepath = env('STORAGE_PATH');
        $executed = [];
        $img1 = [];
        $img2 = [];
        $img3 = [];
        $img4 = [];
        foreach ($request->executed as $index => $arr) {
            $executed[] = [
                'id'   => $index,
                'name' => $arr['value']
            ];
        }
        foreach ($request->img1 as $index => $arr) {
            $name = $arr['value']->getClientOriginalName();
            $ext  = pathinfo($name, PATHINFO_EXTENSION);
            $filename = time() . '-img1.' . $ext;
            $arr['value']->move(public_path('/storage/reports/img1/'), $filename);
            $filename = env('STORAGE_PATH') . 'reports/img1/' . $filename;
            // Log::info($filename);
            $img1[] = [
                'id'   => $index,
                'file' => $filename
            ];
        }
        foreach ($request->img2 as $index => $arr) {
            $name = $arr['value']->getClientOriginalName();
            $ext  = pathinfo($name, PATHINFO_EXTENSION);
            $filename = time() . '-img2.' . $ext;
            $arr['value']->move(public_path('/storage/reports/img2/'), $filename);
            $filename = env('STORAGE_PATH') . 'reports/img2/' . $filename;
            // Log::info($filename);
            $img2[] = [
                'id'   => $index,
                'file' => $filename
            ];
        }
        foreach ($request->img3 as $index => $arr) {
            $name = $arr['value']->getClientOriginalName();
            $ext  = pathinfo($name, PATHINFO_EXTENSION);
            $filename = time() . '-img3.' . $ext;
            $arr['value']->move(public_path('/storage/reports/img3/'), $filename);
            $filename = env('STORAGE_PATH') . 'reports/img3/' . $filename;
            // Log::info($filename);
            $img3[] = [
                'id'   => $index,
                'file' => $filename
            ];
        }
        foreach ($request->img4 as $index => $arr) {
            $name = $arr['value']->getClientOriginalName();
            $ext  = pathinfo($name, PATHINFO_EXTENSION);
            $filename = time() . '-img4.' . $ext;
            $arr['value']->move(public_path('/storage/reports/img4/'), $filename);
            $filename = env('STORAGE_PATH') . 'reports/img4/' . $filename;
            // Log::info($filename);
            $img4[] = [
                'id'   => $index,
                'file' => $filename
            ];
        }
        Report::create([
            "name" => $request->name,
            "number" => $request->number,
            "school" => $request->school,
            "field" => $request->field,
            "value" => $request->value,
            "mocharikin" => $request->mocharikin,
            "monadimin" => $request->monadimin,
            "jomhor" => $request->jomhor,
            "total_mocharikin" => $request->total_mocharikin,
            "executed" => json_encode($executed),
            "img1" => json_encode($img1),
            "img2" => json_encode($img2),
            "img3" => json_encode($img3),
            "img4" => json_encode($img4),
        ]);
        return redirect()->route('reports.create')->with('create', 'ثم انشاء التقرير بنجاح !');
    }

    public function edit($id)
    {
        $r = Report::findOrFail($id);
        return view('reports.edit', [
            'title' => 'تعديل التقرير : ' . $r->name,
            'r' => $r
        ]);
    }

    public function update($id, Request $request)
    {
        $report = Report::findOrFail($id);
        $executed = [];
        $report->update([
            "name" => $request->name,
            "number" => $request->number,
            "school" => $request->school,
            "field" => $request->field,
            "value" => $request->value,
            "mocharikin" => $request->mocharikin,
            "monadimin" => $request->monadimin,
            "jomhor" => $request->jomhor,
            "total_mocharikin" => $request->total_mocharikin,
            "executed" => json_encode($executed)
        ]);
        return redirect()->route('reports.index')->with('update', 'ثم تعديل التقرير بنجاح !');
    }

    public function delete($id)
    {
        $r = Report::findOrFail($id);
        $r->delete();
        return redirect()->route('reports.index')->with('delete', 'ثم حذف التقرير بنجاح');
    }

    public function print($id)
    {
        $data = [
            'title' => 'التقرير',
            'r' => Report::findOrFail($id)
        ];

        $pdf = PDF::loadView('reports.print', $data, [], [
            'format' => 'A4-L',
        ]);

        return $pdf->stream('report' . time() . '.pdf');
    }

    // التقرير الشهري
    public function indexMonthly()
    {
        $reports = MonthlyReport::all();
        $title = "عرض كل التقارير الشهرية و النهائية";
        return view('reports.monthly.index', compact('reports', 'title'));
    }

    public function createMonthly()
    {
        return view('reports.monthly.create', [
            'title' => 'انشاء تقرير',
        ]);
    }

    public function storeMonthly(Request $request)
    {
        $report = new MonthlyReport();

        $report->school = $request->school;
        $report->report_date = $request->report_date;
        $report->q1 = $request->q1;
        $report->q2 = $request->q2;
        $report->q3 = $request->q3;
        $report->q4 = $request->q4;
        $report->q5 = $request->q5;
        $report->q6 = $request->q6;
        $report->q7 = $request->q7;
        $report->save();
        return redirect()->route('reports.monthly.index')->with('create', 'ثم انشاء التقرير بنجاح !');
    }

    public function editMonthly($id)
    {
        $r = MonthlyReport::findOrFail($id);
        return view('reports.monthly.edit', [
            'title' => 'تعديل التقرير : ' . $r->name,
            'report' => $r
        ]);
    }

    public function updateMonthly($id, Request $request)
    {
        $report = MonthlyReport::findOrFail($id);

        $report->school = $request->school;
        $report->report_date = $request->report_date;
        $report->q1 = $request->q1;
        $report->q2 = $request->q2;
        $report->q3 = $request->q3;
        $report->q4 = $request->q4;
        $report->q5 = $request->q5;
        $report->q6 = $request->q6;
        $report->q7 = $request->q7;
        $report->save();
        return redirect()->route('reports.monthly.index')->with('update', 'ثم تعديل التقرير بنجاح');
    }

    public function deleteMonthly($id)
    {
        $r = MonthlyReport::findOrFail($id);
        $r->delete();
        return redirect()->route('reports.monthly.index')->with('delete', 'ثم حذف التقرير بنجاح');
    }

    public function printMonthly($id)
    {
        $data = [
            'title' => 'التقرير',
            'r' => MonthlyReport::findOrFail($id)
        ];

        $pdf = PDF::loadView('reports.monthly.print', $data, [], [
            'format' => 'A4-L',
        ]);

        return $pdf->stream('report-monthly' . time() . '.pdf');
    }

    
}
