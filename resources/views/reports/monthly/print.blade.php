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
            text-align:center;
            margin-bottom : 20px;
        }
    </style>
</head>

<body>
    <table>
        <tbody>
            <tr>
                <th>
                    المدرسة
                </th>
                <td>{{ $r->school }}</td>
            </tr>
            <tr>
                <th>
                    تاريخ التقرير
                </th>
                <td>{{ $r->report_date }}</td>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>البنود</th>
                <th>العدد</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    عدد الأنشطة المنفذة خارج المدارس
                </td>
                <td>{{ $r->q1 }}</td>
            </tr>
            <tr>
                <td>
                    عدد الأنشطة المنفذة داخل المدارس
                </td>
                <td>{{ $r->q2 }}</td>
            </tr>
            <tr>
                <td>
                    عدد الطلاب الذين اجتازوا اختبارات قياس التعرف على الموهوبين
                </td>
                <td>{{ $r->q3 }}</td>
            </tr>
            <tr>
                <td>
                    عدد الطلاب المشاركين في برامج مؤسسة موهبة
                </td>
                <td>{{ $r->q4 }}</td>
            </tr>
            <tr>
                <td>
                  عدد الطلاب المشاركين في الأولمبياد العلمي  
                </td>
                <td>{{ $r->q5 }}</td>
            </tr>
            <tr>
                <td>
                    عدد الطلاب الذين حققوا مراكز متقدمة في النشاط
                </td>
                <td>{{ $r->q6 }}</td>
            </tr>
            <tr>
                <td>
                  عدد المعلمين الذين حققوا مراكز متقدمة  
                </td>
                <td>{{ $r->q7 }}</td>
            </tr>
            
        </tbody>
    </table>
</body>

</html>
