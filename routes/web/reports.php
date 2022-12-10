<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Models\Report;
use App\Models\Evaluation;
use Illuminate\Http\Request;


// قسم التقارير
Route::get('/reports',[ReportController::class , 'index'])->middleware(['permission:عرض التقارير'])->name('reports.index');
Route::get('/reports/create',[ReportController::class , 'create'])->middleware(['permission:إنشاء تقرير'])->name('reports.create');
Route::post('/reports/create',[ReportController::class , 'store'])->middleware(['permission:إنشاء تقرير'])->name('reports.store');
Route::get('/reports/edit/{id}',[ReportController::class , 'edit'])->middleware(['permission:تعديل التقرير'])->name('reports.edit');
Route::post('/reports/update/{id}',[ReportController::class , 'update'])->middleware(['permission:تعديل التقرير'])->name('reports.update');
Route::post('/reports/delete/{id}',[ReportController::class , 'delete'])->middleware(['permission:حذف التقرير'])->name('reports.delete');

//التقرير الشهري و النهائي
Route::get('/reports-monthly',[ReportController::class , 'indexMonthly'])->middleware(['permission:عرض التقارير'])->name('reports.monthly.index');
Route::get('/reports-monthly/create',[ReportController::class , 'createMonthly'])->middleware(['permission:إنشاء تقرير'])->name('reports.monthly.create');
Route::post('/reports-monthly/create',[ReportController::class , 'storeMonthly'])->middleware(['permission:إنشاء تقرير'])->name('reports.monthly.store');
Route::get('/reports-monthly/edit/{id}',[ReportController::class , 'editMonthly'])->middleware(['permission:تعديل التقرير'])->name('reports.monthly.edit');
Route::post('/reports-monthly/update/{id}',[ReportController::class , 'updateMonthly'])->middleware(['permission:تعديل التقرير'])->name('reports.monthly.update');
Route::post('/reports-monthly/delete/{id}',[ReportController::class , 'deleteMonthly'])->middleware(['permission:حذف التقرير'])->name('reports.monthly.delete');
Route::get('/reports-monthly/print/{id}',[ReportController::class , 'printMonthly'])->name('reports.monthly.print');




Route::get('/reports/{id}', function ($id) {
    $r = Report::findOrFail($id);
    return view('reports.show', [
        'title' => 'عرض التقرير',
        'r' => $r
    ]);
})->name('reports.show');
Route::get('/reports/evaluation/{id}', function ($id) {
    $r = Report::findOrFail($id);
    return view('reports.show', [
        'title' => 'عرض تقييم التقرير ' . $r->name,
        'r' => Evaluation::findOrFail($r->id)
    ]);
});
Route::get('/reports/evaluation/{id}', function ($id) {
    $r = Report::findOrFail($id);
    return view('reports.evaluation', [
        'title' => 'تقييم التقرير',
        'r' => $r
    ]);
})->name('reports.evaluation');
Route::post('/reports/evaluation/{id}', function ($id, Request $req) {
    $r = Report::findOrFail($id);
    $total = (int)$req->q1 + (int)$req->q2 + (int)$req->q3 + (int)$req->q4 + (int)$req->q5 + (int)$req->q6 + (int)$req->q7 + (int)$req->q8 + (int)$req->q9 + (int)$req->q10 + (int)$req->q11 + (int)$req->q12;
    Evaluation::create([
        'idea' => $req->idea,
        'value' => $req->value,
        'q1' => $req->q1,
        'q2' => $req->q2,
        'q3' => $req->q3,
        'q4' => $req->q4,
        'q5' => $req->q5,
        'q6' => $req->q6,
        'q7' => $req->q7,
        'q8' => $req->q8,
        'q9' => $req->q9,
        'q10' => $req->q10,
        'q11' => $req->q11,
        'q12' => $req->q12,
        'total' => $total,
        'report_id' => $r->id,
    ]);
    return back()->with('create', 'ثم تقييم التقرير بنجاح');
})->name('reports.evaluation.post');
Route::get('/reports/evaluation/edit/{id}', function ($id) {
    $r = Report::findOrFail($id);
    return view('reports.evaluation-edit', [
        'title' => 'تعديل تقييم التقرير',
        'r' => Evaluation::findOrFail($r->id)
    ]);
})->name('reports.evaluation.edit');
Route::post('/reports/evaluation/edit/{id}', function ($id, Request $req) {
    $r = Report::findOrFail($id);
    $total = (int)$req->q1 + (int)$req->q2 + (int)$req->q3 + (int)$req->q4 + (int)$req->q5 + (int)$req->q6 + (int)$req->q7 + (int)$req->q8 + (int)$req->q9 + (int)$req->q10 + (int)$req->q11 + (int)$req->q12;
    $evaluation = Evaluation::findOrFail($r->evaluation->id);
    $evaluation->update([
        'idea' => $req->idea,
        'value' => $req->value,
        'q1' => $req->q1,
        'q2' => $req->q2,
        'q3' => $req->q3,
        'q4' => $req->q4,
        'q5' => $req->q5,
        'q6' => $req->q6,
        'q7' => $req->q7,
        'q8' => $req->q8,
        'q9' => $req->q9,
        'q10' => $req->q10,
        'q11' => $req->q11,
        'q12' => $req->q12,
        'total' => $total,
        'report_id' => $r->id,
    ]);
    return back()->with('update', 'ثم تعديل تقييم التقرير بنجاح');
})->name('reports.evaluation.edit.post');
Route::get('/reports/images/{id}', function ($id, Request $req) {
    $r = Report::findOrFail($id);
    return view('reports.images', ['title' => '', 'r' => $r]);
})->name('reports.images');
Route::post('/reports/delete/img/{id}/{img}/{imgid}', function ($id, Request $req) {
    $report = Report::findOrFail($id);
    if ($req->img == 1) {
        $img1 = json_decode($report->img1);
        $temp = [];
        $j = 0;
        for ($i = 0; $i < count($img1); $i++) {
            if ($req->imgid != $img1[$i]->id) {
                $temp[] = [
                    'id' => $j++,
                    'file' => $img1[$i]->file,
                ];
            }
        }
        $report->img1 = json_encode($temp);
        $report->save();
        return back()->with('delete', 'ثم الحذف بنجاح ');
    }
    if ($req->img == 2) {
        $img2 = json_decode($report->img2);
        $temp = [];
        $j = 0;
        for ($i = 0; $i < count($img2); $i++) {
            if ($req->imgid != $img2[$i]->id) {
                $temp[] = [
                    'id' => $j++,
                    'file' => $img2[$i]->file,
                ];
            }
        }
        $report->img2 = json_encode($temp);
        $report->save();
        return back()->with('delete', 'ثم الحذف بنجاح ');
    }
    if ($req->img == 3) {
        $img3 = json_decode($report->img3);
        $temp = [];
        $j = 0;
        for ($i = 0; $i < count($img3); $i++) {
            if ($req->imgid != $img3[$i]->id) {
                $temp[] = [
                    'id' => $j++,
                    'file' => $img3[$i]->file,
                ];
            }
        }
        $report->img3 = json_encode($temp);
        $report->save();
        return back()->with('delete', 'ثم الحذف بنجاح ');
    }
    if ($req->img == 4) {
        $img4 = json_decode($report->img4);
        $temp = [];
        $j = 0;
        for ($i = 0; $i < count($img4); $i++) {
            if ($req->imgid != $img4[$i]->id) {
                $temp[] = [
                    'id' => $j++,
                    'file' => $img4[$i]->file,
                ];
            }
        }
        $report->img4 = json_encode($temp);
        $report->save();
        return back()->with('delete', 'ثم الحذف بنجاح ');
    }
})->name('reports.image.delete');
Route::post('/reports/update/img/{id}/{img}/{imgid}', function ($id, Request $req) {
    $report = Report::findOrFail($id);
    if ($req->img == 1) {
        $img1 = json_decode($report->img1);
        $name = $req->file->getClientOriginalName();
        $ext  = pathinfo($name, PATHINFO_EXTENSION);
        $filename = time() . '-img1.' . $ext;
        $req->file->move(public_path('/storage/reports/img1/'), $filename);
        $filename = env('STORAGE_PATH') . 'reports/img1/' . $filename;
        $img1[$req->imgid]->file = $filename;
        $report->img3 = json_encode($img1);
        $report->save();
        return back()->with('update', 'ثم التعديل بنجاح ');
    }
    if ($req->img == 2) {
        $img2 = json_decode($report->img2);
        $name = $req->file->getClientOriginalName();
        $ext  = pathinfo($name, PATHINFO_EXTENSION);
        $filename = time() . '-img2.' . $ext;
        $req->file->move(public_path('/storage/reports/img2/'), $filename);
        $filename = env('STORAGE_PATH') . 'reports/img2/' . $filename;
        $img2[$req->imgid]->file = $filename;
        $report->img2 = json_encode($img2);
        $report->save();
        return back()->with('update', 'ثم التعديل بنجاح ');
    }
    if ($req->img == 3) {
        $img3 = json_decode($report->img3);
        $name = $req->file->getClientOriginalName();
        $ext  = pathinfo($name, PATHINFO_EXTENSION);
        $filename = time() . '-img3.' . $ext;
        $req->file->move(public_path('/storage/reports/img3/'), $filename);
        $filename = env('STORAGE_PATH') . 'reports/img3/' . $filename;
        $img3[$req->imgid]->file = $filename;
        $report->img3 = json_encode($img3);
        $report->save();
        return back()->with('update', 'ثم التعديل بنجاح ');
    }
    if ($req->img == 4) {
        $img4 = json_decode($report->img4);
        $name = $req->file->getClientOriginalName();
        $ext  = pathinfo($name, PATHINFO_EXTENSION);
        $filename = time() . '-img4.' . $ext;
        $req->file->move(public_path('/storage/reports/img4/'), $filename);
        $filename = env('STORAGE_PATH') . 'reports/img4/' . $filename;
        $img4[$req->imgid]->file = $filename;
        $report->img4 = json_encode($img4);
        $report->save();
        return back()->with('update', 'ثم التعديل بنجاح ');
    }
})->name('reports.image.update');
Route::post('/reports/create/img/{id}/{img}', function ($id, Request $req) {
    $report = Report::findOrFail($id);
    if ($req->img == 1) {
        $img1 = json_decode($report->img1);
        $name = $req->file->getClientOriginalName();
        $ext  = pathinfo($name, PATHINFO_EXTENSION);
        $filename = time() . '-img1.' . $ext;
        $req->file->move(public_path('/storage/reports/img1/'), $filename);
        $filename = env('STORAGE_PATH') . 'reports/img1/' . $filename;
        $img1[]  = [
            'id' => count($img1),
            'file' => $filename
        ];
        $report->img1 = json_encode($img1);
        $report->save();
        return back()->with('create', 'ثم انشاء صورة بنجاح ');
    }
    if ($req->img == 2) {
        $img2 = json_decode($report->img2);
        $name = $req->file->getClientOriginalName();
        $ext  = pathinfo($name, PATHINFO_EXTENSION);
        $filename = time() . '-img2.' . $ext;
        $req->file->move(public_path('/storage/reports/img2/'), $filename);
        $filename = env('STORAGE_PATH') . 'reports/img2/' . $filename;
        $img2[]  = [
            'id' => count($img2),
            'file' => $filename
        ];
        $report->img2 = json_encode($img2);
        $report->save();
        return back()->with('update', 'ثم التعديل بنجاح ');
    }
    if ($req->img == 3) {
        $img3 = json_decode($report->img3);
        $name = $req->file->getClientOriginalName();
        $ext  = pathinfo($name, PATHINFO_EXTENSION);
        $filename = time() . '-img3.' . $ext;
        $req->file->move(public_path('/storage/reports/img3/'), $filename);
        $filename = env('STORAGE_PATH') . 'reports/img3/' . $filename;
        $img3[]  = [
            'id' => count($img3),
            'file' => $filename
        ];
        $report->img3 = json_encode($img3);
        $report->save();
        return back()->with('update', 'ثم التعديل بنجاح ');
    }
    if ($req->img == 4) {
        $img4 = json_decode($report->img4);
        $name = $req->file->getClientOriginalName();
        $ext  = pathinfo($name, PATHINFO_EXTENSION);
        $filename = time() . '-img4.' . $ext;
        $req->file->move(public_path('/storage/reports/img4/'), $filename);
        $filename = env('STORAGE_PATH') . 'reports/img4/' . $filename;
        $img4[]  = [
            'id' => count($img4),
            'file' => $filename
        ];
        $report->img4 = json_encode($img4);
        $report->save();
        return back()->with('update', 'ثم التعديل بنجاح ');
    }
})->name('reports.image.create');

Route::get('/reports/print/{id}',[ReportController::class , 'print'])->name('reports.print');

Route::get('/reports/evaluation/print/{id}', function ($id, Request $req) {
    $report = Report::findOrFail($id);
    // dd($report->evaluation);
    $data = [
        'report' => $report,
        'r' => $report->evaluation,
        'path' => public_path('assets/media/pdf-print/logo.png')
    ];
    $pdf = PDF::loadView('reports.print-evaluation', $data, [], [
        'format' => 'A3-L',
    ]);
    return $pdf->stream('Evaluation-' . time() . '.pdf');
})->name("evaluation.print");


