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
                <th>المشرف</th>
                <th>المجال</th>
                <th>الأحد</th>
                <th>الإثنين</th>
                <th>الثلاثاء</th>
                <th>الأربعاء</th>
                <th>الخميس</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->user->name }}</td>
                <td>{{ $d->user->field }}</td>
                <td>{{ $d->q1 }}</td>
                <td>{{ $d->q2 }}</td>
                <td>{{ $d->q3 }}</td>
                <td>{{ $d->q4 }}</td>
                <td>{{ $d->q5 }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
