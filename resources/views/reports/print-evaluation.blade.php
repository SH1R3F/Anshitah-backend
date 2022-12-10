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
        <tbody>

            <tr>
                <th>عنوان التقرير</th>
                <td>{{ $report->name }}</td>
            </tr>
            <tr>
                <th>الفكرة</th>
                <td>{{ $r->q1 }}</td>
            </tr>
            <tr>
                <th>القيمة التربوية</th>
                <td>{{ $r->q2 }}</td>
            </tr>
            <tr>
                <th>الالتزام بالتنفيذ حسب الخطة الزمنية المعتمدة</th>
                <td>{{ $r->q3 }}</td>
            </tr>
            <tr>
                <th>رفع بيانات المشاركين على المنصة في الوقت المحدد</th>
                <td>{{ $r->q4 }}</td>
            </tr>
            <tr>
                <th>رفع تقرير النشاط خلال أسبوع من تاريخ التنفيذ</th>
                <td>{{ $r->q5 }}</td>
            </tr>
            <tr>
                <th>حضور الطلاب والمشرف للدورات والمحاضرات</th>
                <td>{{ $r->q6 }}</td>
            </tr>
            <tr>
                <th>التقيد بتعليمات وشروط المسابقة</th>
                <td>{{ $r->q7 }}</td>
            </tr>
            <tr>
                <th>توفر إعلانات تخص النشاط المنفذ</th>
                <td>{{ $r->q8 }}</td>
            </tr>
            <tr>
                <th>تسجيل العدد المخصص لكل مدرسة (5طلاب)</th>
                <td>{{ $r->q9 }}</td>
            </tr>
            <tr>
                <th>مناسبة النشاط للمرحلة العمرية</th>
                <td>{{ $r->q10 }}</td>
            </tr>
            <tr>
                <th>توثيق النشاط ( صور + فيديو )</th>
                <td>{{ $r->q11 }}</td>
            </tr>
            <tr>
                <th>النشر الإعلامي ( حسابات المدرسة والإدارة )</th>
                <td>{{ $r->q12 }}</td>
            </tr>
            <tr>
                <th>نتيجة التقييم</th>
                <td>{{ $r->total }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
