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
    <table style="margin-bottom: 15px">
        <tr>
            <td>المدرسة</td>
            <td>{{ $data->school }}</td>
            <td>التاريخ</td>
            <td>{{ $data->date }}</td>
            <td>رائد نشاط</td>
            <td>{{ $data->user->name }}</td>
        </tr>
    </table>
    <table>
        <tr>
            <td>العناصر</td>
            <td>م</td>
            <td>البيان</td>
            <td>تم</td>
            {{-- <th>3</th>
            <th>4</th> --}}
            <td>الشواهد</td>
        </tr>
        <tr>
            <td rowspan="3">متطلبات عمل رائد النشاط الأساسية</td>
            <td>1</td>
            <td>بناء خطة النشاط و إعادتها</td>
            <td>
                @if($data->q1)
                <svg fill="#5ABD07" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                @else
                <svg fill="#EE9D1E" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
                @endif
            </td>
            <td>الالالا</td>
        </tr>
        <tr>
            <td>2</td>
            <td>تكوين مجلس النشاط الطلابي</td>
            <td>
                @if($data->q2)
                <svg fill="#5ABD07" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                @else
                <svg fill="#EE9D1E" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
                @endif
            </td>
            <td>الالالا</td>
        </tr>
        <tr>
            <td>3</td>
            <td>حفط سجلات العمل و إعداد التقارير و نماذج العمل</td>
            <td>
                @if($data->q3)
                <svg fill="#5ABD07" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                @else
                <svg fill="#EE9D1E" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
                @endif
            </td>
            <td>الالالا</td>
        </tr>
        <tr>
            <td rowspan="7">الأداء الفني لرائد النشاط</td>
            <td>1</td>
            <td>بناء خطة النشاط و إعادتها</td>
            <td>
                @if($data->q4)
                <svg fill="#5ABD07" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                @else
                <svg fill="#EE9D1E" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
                @endif
            </td>
            <td>الالالا</td>
        </tr>
        <tr>
            <td>2</td>
            <td>تكوين مجلس النشاط الطلابي</td>
            <td>
                @if($data->q5)
                <svg fill="#5ABD07" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                @else
                <svg fill="#EE9D1E" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
                @endif
            </td>
            <td>الالالا</td>
        </tr>
        <tr>
            <td>3</td>
            <td>حفط سجلات العمل و إعداد التقارير و نماذج العمل</td>
            <td>
                @if($data->q6)
                <svg fill="#5ABD07" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                @else
                <svg fill="#EE9D1E" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
                @endif
            </td>            <td>الالالا</td>
        </tr>
        <tr>
            <td>4</td>
            <td>بناء خطة النشاط و إعادتها</td>
            <td>
                @if($data->q7)
                <svg fill="#5ABD07" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                @else
                <svg fill="#EE9D1E" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
                @endif
            </td>            <td>الالالا</td>
        </tr>
        <tr>
            <td>5</td>
            <td>تكوين مجلس النشاط الطلابي</td>
            <td>
                @if($data->q8)
                <svg fill="#5ABD07" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                @else
                <svg fill="#EE9D1E" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
                @endif
            </td>            <td>الالالا</td>
        </tr>
        <tr>
            <td>6</td>
            <td>حفط سجلات العمل و إعداد التقارير و نماذج العمل</td>
            <td>
                @if($data->q9)
                <svg fill="#5ABD07" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                @else
                <svg fill="#EE9D1E" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
                @endif
            </td>            <td>الالالا</td>
        </tr>
        <tr>
            <td>7</td>
            <td>حفط سجلات العمل و إعداد التقارير و نماذج العمل</td>
            <td>
                @if($data->q10)
                <svg fill="#5ABD07" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                @else
                <svg fill="#EE9D1E" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
                @endif
            </td>            <td>الالالا</td>
        </tr>
        <tr>
            <td rowspan="3">مراجعة مدير المدرسة</td>
            <td>1</td>
            <td>بناء خطة النشاط و إعادتها</td>
            <td>
                @if($data->q11)
                <svg fill="#5ABD07" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                @else
                <svg fill="#EE9D1E" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
                @endif
            </td>            <td>الالالا</td>
        </tr>
        <tr>
            <td>2</td>
            <td>تكوين مجلس النشاط الطلابي</td>
            <td>
                @if($data->q12)
                <svg fill="#5ABD07" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                @else
                <svg fill="#EE9D1E" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
                @endif
            </td>            <td>الالالا</td>
        </tr>
        <tr>
            <td>3</td>
            <td>حفط سجلات العمل و إعداد التقارير و نماذج العمل</td>
            <td>
                @if($data->q13)
                <svg fill="#5ABD07" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                @else
                <svg fill="#EE9D1E" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
                @endif
            </td>            <td>الالالا</td>
        </tr>
    </table>
</body>

</html>
