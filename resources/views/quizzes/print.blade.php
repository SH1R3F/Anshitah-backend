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
        h1,h2 {
            text-align: center;
            padding: 5px;
        }
    </style>

</head>

<body>
    <div>
        <img src="{{ $path }}" width="450" height="100" style="margin-bottom: 2.5em">
    </div>
    <h1>نتيجة الإختبار</h1>
    <h2>{{ $quiz->name }}</h2>
    <table>
        <thead>
            <tr>
                <th>المجال</th>
                <th>السؤال</th>
                <th>إجابتك</th>
                <th>الإجابة الصحيحة</th>
                <th>درجة السؤال</th>
                <th>نقطتك</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $q)
            <tr>
                <td>{{ $q->topic }}</td>
                <td>{{ $q->name }}</td>
                <td>{{ $answers[$loop->index] }}</td>
                <td>{{ $q->answer }}</td>
                <td>{{ $q->mark }}</td>
                <td>{{ $marks[$loop->index] }}</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="4">المجموع</th>
                <td colspan="2">{{ $total }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
