<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PDF;

class PlanController extends Controller
{
    // عرض كل الخطط
    public function index()
    {
        $plans = Plan::all();
        return view('plans.all', [
            'title' => 'كل الخطط',
            'plans' => $plans
        ]);
    }

    // إنشاء خطة
    public function create()
    {
        return view('plans.create', [
            'title' => 'إنشاء خطة'
        ]);
    }

    public function store(Request $request)
    {
        $plan = new Plan([
            'majal_awl' => $request->majal_awl,
            'hadf_istratiji' => $request->hadf_istratiji,
            'hadf_tachghili' => $request->hadf_tachghili,
            'mohima' => $request->mohima,
            'wasf_mohima' => $request->wasf_mohima,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'al_moda' => $request->al_moda,
            'adaa_idara' => $request->adaa_idara,
            'adaa_madariss' => $request->adaa_madariss,
            'nokat_qiass' => $request->nokat_qiass,
            'ijraat' => $request->ijraat,
            'amakin_tanfid' => $request->amakin_tanfid,
            'asalib_tanfid' => $request->asalib_tanfid,
            'aljihat_mosanida' => $request->aljihat_mosanida,
        ]);
        $array = [];
        if($request->array){
            foreach($request->array as $index => $arr){
                $name = $arr['file']->getClientOriginalName();
                $ext  = pathinfo($name , PATHINFO_EXTENSION);
                $filename = time() . '-fileplan.' . $ext;
                $arr['file']->move(public_path('/storage/plans/') , $filename);
                $filename = env('STORAGE_PATH') . 'plans/' . $filename;
                // Log::info($filename);
                $array[] = [
                    'id'   => $index,
                    'name' => $arr['name'],
                    'file' => $filename
                ];
            }
        }
        // dd(json_encode($array));
        $plan->file = json_encode($array);
        $plan->save();
        $msg = "ثم إنشاء الخطة بنجاح";
        return back()->with('create', $msg);
    }

    // عرض الخطة على شكل جدول
    public function show($id)
    {
        $plan = Plan::findOrFail($id);
        return view('plans.show', [
            'title' => 'عرض الخطة',
            'plan' => $plan
        ]);
    }

    // تعديل الخطة
    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view(
            'plans.edit',
            [
                'title' => 'تعديل الخطة',
                'plan' => $plan,
                'ijraat' => json_decode($plan->file)
            ]
        );
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $plan = Plan::findOrFail($id);
        $plan->majal_awl = $request->majal_awl;
        $plan->hadf_istratiji = $request->hadf_istratiji;
        $plan->hadf_tachghili = $request->hadf_tachghili;
        $plan->mohima = $request->mohima;
        $plan->wasf_mohima = $request->wasf_mohima;
        $plan->date_start = $request->date_start;
        $plan->date_end = $request->date_end;
        $plan->al_moda = $request->al_moda;
        $plan->adaa_idara = $request->adaa_idara;
        $plan->adaa_madariss = $request->adaa_madariss;
        $plan->nokat_qiass = $request->nokat_qiass;
        $plan->ijraat = $request->ijraat;
        $plan->amakin_tanfid = $request->amakin_tanfid;
        $plan->asalib_tanfid = $request->asalib_tanfid;
        $plan->aljihat_mosanida = $request->aljihat_mosanida;
        $plan->save();
        $msg = "ثم تعديل الخطة بنجاح";
        return back()->with('update', $msg);
    }

    // حذف الخطة
    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();
        $msg = "ثم حذف الخطة";
        return back()->with('delete', $msg);
    }

    // طباعة الخطة
    public function print($id)
    {
        $data = [
            'plan' => Plan::findOrFail($id),
            'path' => public_path('assets/media/pdf-print/logo.png')
        ];
        $pdf = PDF::loadView('plans.print', $data, [], [
            'format' => 'A3-L',
        ]);
        return $pdf->stream('plan' . $data['plan']->id . '.pdf');
    }

    // الاجراءات
    public function ijraat($id){
        $plan = Plan::findOrFail($id);
        return view('plans.ijraat' , [
            'title' => 'الاجراءات',
            'plan' => $plan,
            'ijraat' => json_decode($plan->file)
        ]);
    }

    // تعديل اجراء
    public function update_ijraa(Request $request){
        $id = $request->id;
        $name = $request->name;
        $plan = Plan::findOrFail($request->plan);
        $ijraat = json_decode($plan->file);
        $ijraat[$id]->name = $name;
        if ($request->file) {
            $image    = $request->file('file');
            $filename = time() . '-fileplan.' . $image->extension();
            Storage::disk('public')->putFileAs(
                'plans',
                $image,
                $filename
            );
            $ijraat[$id]->file = env('STORAGE_PATH') . 'plans/' . $filename;
        }
        $final = json_encode($ijraat);
        $plan->file = $final;
        $plan->save();
        return back()->with('update' , 'ثم تعديل الاجراء بنجاح');
    }

    // انشاء اجراء
    public function create_ijraa(Request $request){
        $plan = Plan::findOrFail($request->plan);
        $name = $request->name;
        $ijraat = json_decode($plan->file);
        $index = count($ijraat);
        if ($request->file) {
            $image    = $request->file('file');
            $filename = time() . '-fileplan.' . $image->extension();
            Storage::disk('public')->putFileAs(
                'plans',
                $image,
                $filename
            );
        }
        $ijraat[] = [
            'id' => $index,
            'name' => $name,
            'file' => env('STORAGE_PATH') . 'plans/' . $filename
        ];
        $final = json_encode($ijraat);
        $plan->file = $final;
        $plan->save();
        return back()->with('create' , 'ثم انشاء الاجراء بنجاح');
    }
    // حذف اجراء
    public function delete_ijraa(Request $request , $plan , $id){
        $plan = Plan::findOrFail($plan);
        $ijraat = json_decode($plan->file);
        $temp = [];
        $j = 0;
        for($i = 0; $i < count($ijraat); $i++){
            if($id != $ijraat[$i]->id){
                $temp[] = [
                    'id' => $j++,
                    'name' => $ijraat[$i]->name,
                    'file' => $ijraat[$i]->file,
                ];
            }
        }
        $plan->file = json_encode($temp);
        $plan->save();
        return back()->with('delete' , 'ثم حذف الاجراء بنجاح');
    }
}
