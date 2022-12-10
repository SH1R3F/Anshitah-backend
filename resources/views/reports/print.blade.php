<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 23px
        }

        img {
            width: 150px;
        }

        table {
            width: 1600px;
        }

        th {
            background-color: rgb(247, 179, 54);
            border: 1px solid;
            padding: 1em .5em;
            width: 450px;
            text-align: right
        }

        td {
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
    <table>
        <tbody>
            <tr>
                <th>التاريخ</th>
                <td>{{ $r->created_at->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>نتيجة التقييم</th>
                <td>لم يتم التقييم بعد</td>
            </tr>
            <tr>
                <th>عنوان التقرير</th>
                <td>{{ $r->name }}</td>
            </tr>
            <tr>
                <th>رقم النشاط</th>
                <td>{{ $r->number }}</td>
            </tr>
            <tr>
                <th>المدرسة</th>
                <td>{{ $r->school }}</td>
            </tr>
            <tr>
                <th>المجال</th>
                <td>{{ $r->field }}</td>
            </tr>
            <tr>
                <th>القيمة التربوية</th>
                <td>{{ $r->value }}</td>
            </tr>
            <tr>
                <th>عدد الطلاب المشاركين</th>
                <td>{{ $r->mocharikin }}</td>
            </tr>
            <tr>
                <th>عدد الطلاب المنظمين</th>
                <td>{{ $r->monadimin }}</td>
            </tr>
            <tr>
                <th>عدد الطلاب الجمهور</th>
                <td>{{ $r->jomhor }}</td>
            </tr>
            <tr>
                <th>إجمالي عدد المشاركين</th>
                <td>{{ $r->total_mocharikin }}</td>
            </tr>
            <tr>
                <th>ابرز ما تم تنفيذه من المدرسة للطلاب</th>
                <td>
                    @foreach (json_decode($r->executed) as $e)
                    <span>
                        {{ (int)$e->id + 1 }}
                        -
                        {{ $e->name }}
                    </span>
                    <br>
                    @endforeach
                </td>
            </tr>
            
        </tbody>
    </table>
</body>

</html>
