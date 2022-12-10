<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        table {
            width: 1600px;
        }

        th {
            background-color: rgb(247, 179, 54);
            border: 1px solid;
            text-align: center;
            padding: 1em .5em;
        }

        td {
            text-align: center;
            border: 1px solid;
            padding: 1em .5em;
        }

        td.special {
            background-color: rgb(241, 203, 131);
        }

        table {
            border-spacing: 0;
        }

    </style>
</head>

<body>
    <div>
        <img src="{{ $path }}" width="450" height="100" style="margin-bottom: 2.5em">
    </div>
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
</body>

</html>
