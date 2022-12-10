@extends('layouts.app')

@section('action')
<a href="{{ route('ratings.create') }}" class="btn btn-primary mr-2">إنشاء خطة</a>
<a href="{{ asset($plan->file) }}" class="btn btn-info">
    الملف
</a>
@endsection

@section('content')
<style>
    th {
        background-color: rgb(247, 179, 54);
        border: 1px solid;
        text-align: center;
    }
    td {
        text-align: center;
        border: 1px solid;
    }
    td.special {
        background-color: rgb(241, 203, 131);
    }
</style>
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="4">المجال الأول</th>
                                <td colspan="8">{{ $plan->majal_awl }}</td>
                            </tr>
                            <tr>
                                <th colspan="4">الهدف الإستراتيجي</th>
                                <td colspan="8">{{ $plan->hadf_istratiji }}</td>
                            </tr>
                            <tr>
                                <th colspan="4">الهدف التشغيلي</th>
                                <td colspan="8">{{ $plan->hadf_tachghili }}</td>
                            </tr>
                            <tr>
                                <th colspan="4">مهمة / برنامج</th>
                                <td colspan="8" class="special">{{ $plan->mohima }}</td>
                            </tr>
                            <tr>
                                <th colspan="4">وصف المهمة / البرنامج</th>
                                <td colspan="8" class="special">{{ $plan->wasf_mohima }}</td>
                            </tr>
                            <tr>
                                <th colspan="3">التاريخ</th>
                                <th colspan="3">مؤشرات الأداء</th>
                                <th colspan="3">نقط القياس و نسبة التحقق</th>
                                <th colspan="3">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="1">من</td>
                                <td colspan="2">{{ $plan->date_start }}</td>
                                <td colspan="1" class="special">مؤشر الأداء للإدارة</td>
                                <td colspan="2">{!! $plan->adaa_idara !!}</td>
                                <td colspan="3" rowspan="3">{!! $plan->nokat_qiass !!}</td>
                                <td colspan="3" rowspan="3">{!! $plan->ijraat !!}</td>
                            </tr>
                            <tr>
                                <td colspan="1">إلى</td>
                                <td colspan="2">{{ $plan->date_end }}</td>
                                <td colspan="1" rowspan="2" class="special">مؤشر الأداء للمدارس</td>
                                <td colspan="2" rowspan="2">{!! $plan->adaa_madariss !!}</td>
                            </tr>
                            <tr>
                                <td colspan="1">المدة</td>
                                <td colspan="2">{{ $plan->al_moda }}</td>
                            </tr>
                            <tr>
                                <th colspan="4">أماكن التنفيذ</th>
                                <th colspan="4">أساليب التنفيذ</th>
                                <th colspan="4">الجهات المساندة</th>
                            </tr>
                            <tr>
                                <td colspan="4">{!! $plan->amakin_tanfid !!}</td>
                                <td colspan="4">{!! $plan->asalib_tanfid !!}</td>
                                <td colspan="4">{!! $plan->aljihat_mosanida !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
