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
                <th>الأندية و الفرق</th>
                <th>المشرف</th>
                <th>الفرق التابعة</th>
                <th>المقرر</th>
                <th>الأعضاء</th>
                <th>التوقيع</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>النادي العلمي</td>
                <td>{{ json_decode($data->nadi_3ilmi)->mochrif }}</td>
                <td>
                    @foreach (json_decode($data->nadi_3ilmi)->data as $d)
                        <p>{{ $d->equipe }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_3ilmi)->data as $d)
                        <p>{{ $d->mokarir }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_3ilmi)->data as $d)
                        <p>{{ $d->member }}</p>
                    @endforeach
                </td>
                <td></td>
            </tr>
            <tr>
                <td>النادي الثقافي</td>
                <td>{{ json_decode($data->nadi_taqafi)->mochrif }}</td>
                <td>
                    @foreach (json_decode($data->nadi_taqafi)->data as $d)
                        <p>{{ $d->equipe }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_taqafi)->data as $d)
                        <p>{{ $d->mokarir }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_taqafi)->data as $d)
                        <p>{{ $d->member }}</p>
                    @endforeach
                </td>
                <td></td>
            </tr>
            <tr>
                <td>نادي التفكير و الإبداع</td>
                <td>{{ json_decode($data->nadi_tafkir)->mochrif }}</td>
                <td>
                    @foreach (json_decode($data->nadi_tafkir)->data as $d)
                        <p>{{ $d->equipe }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_tafkir)->data as $d)
                        <p>{{ $d->mokarir }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_tafkir)->data as $d)
                        <p>{{ $d->member }}</p>
                    @endforeach
                </td>
                <td></td>
            </tr>
            <tr>
                <td>نادي العطاء و التطوع</td>
                <td>{{ json_decode($data->nadi_tatawo3)->mochrif }}</td>
                <td>
                    @foreach (json_decode($data->nadi_tatawo3)->data as $d)
                        <p>{{ $d->equipe }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_tatawo3)->data as $d)
                        <p>{{ $d->mokarir }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_tatawo3)->data as $d)
                        <p>{{ $d->member }}</p>
                    @endforeach
                </td>
                <td></td>
            </tr>
            <tr>
                <td>الفريق الفني و المهني</td>
                <td>{{ json_decode($data->nadi_mihani)->mochrif }}</td>
                <td>
                    @foreach (json_decode($data->nadi_mihani)->data as $d)
                        <p>{{ $d->equipe }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_mihani)->data as $d)
                        <p>{{ $d->mokarir }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_mihani)->data as $d)
                        <p>{{ $d->member }}</p>
                    @endforeach
                </td>
                <td></td>
            </tr>
            <tr>
                <td>فريق التربية الرياضية</td>
                <td>{{ json_decode($data->nadi_sport)->mochrif }}</td>
                <td>
                    @foreach (json_decode($data->nadi_sport)->data as $d)
                        <p>{{ $d->equipe }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_sport)->data as $d)
                        <p>{{ $d->mokarir }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_sport)->data as $d)
                        <p>{{ $d->member }}</p>
                    @endforeach
                </td>
                <td></td>
            </tr>
            <tr>
                <td>الفريق الكشفي</td>
                <td>{{ json_decode($data->nadi_kachfi)->mochrif }}</td>
                <td>
                    @foreach (json_decode($data->nadi_kachfi)->data as $d)
                        <p>{{ $d->equipe }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_kachfi)->data as $d)
                        <p>{{ $d->mokarir }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_kachfi)->data as $d)
                        <p>{{ $d->member }}</p>
                    @endforeach
                </td>
                <td></td>
            </tr>
            <tr>
                <td>الفريق الاجتماعي</td>
                <td>{{ json_decode($data->nadi_ijtima3i)->mochrif }}</td>
                <td>
                    @foreach (json_decode($data->nadi_ijtima3i)->data as $d)
                        <p>{{ $d->equipe }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_ijtima3i)->data as $d)
                        <p>{{ $d->mokarir }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_ijtima3i)->data as $d)
                        <p>{{ $d->member }}</p>
                    @endforeach
                </td>
                <td></td>
            </tr>
            <tr>
                <td>التدريب و التطوير</td>
                <td>{{ json_decode($data->nadi_tadrib)->mochrif }}</td>
                <td>
                    @foreach (json_decode($data->nadi_tadrib)->data as $d)
                        <p>{{ $d->equipe }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_tadrib)->data as $d)
                        <p>{{ $d->mokarir }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach (json_decode($data->nadi_tadrib)->data as $d)
                        <p>{{ $d->member }}</p>
                    @endforeach
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
