@extends('layouts.app')
@section('action')
    <a href="{{ route('ziyaratmochrif') }}" class="btn btn-primary">الزيارات</a>
@endsection
@section('content')
    <form action="{{ route('ziyaratmochrif.store') }}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <label for="school">المدرسة</label>
                    <select name="school" class="flex-grow-1 form-control">
                        @foreach ($schools as $school)
                            <option value="{{ $school }}">{{ $school }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="date">التاريخ</label>
                    <input type="date" name="date" class="flex-grow-1 form-control">
                </div>
                <div class="col-4">
                    <label for="user_id">رائد نشاط</label>
                    <select name="user_id" class="flex-grow-1 form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <table class="table table-bordered table-dark mt-2">
                <thead>
                    <th>العناصر</th>
                    <th>م</th>
                    <th>البيان</th>
                    <th>تم</th>
                    {{-- <th>3</th>
                    <th>4</th> --}}
                    <th>الشواهد</th>
                </thead>
                <tbody>
                    <tr>
                       <td rowspan="3">متطلبات عمل رائد النشاط الأساسية</td>
                       <td>1</td>
                       <td>بناء خطة النشاط و إعادتها</td>
                       <td><input name="q1" type="checkbox" class="form-checkbox"></td>
                       <td>الالالا</td>
                    </tr>
                    <tr>
                       <td>2</td>
                       <td>تكوين مجلس النشاط الطلابي</td>
                       <td><input name="q2" type="checkbox" class="form-checkbox"></td>
                       <td>الالالا</td>
                    </tr>
                    <tr>
                       <td>3</td>
                       <td>حفط سجلات العمل و إعداد التقارير و نماذج العمل</td>
                       <td><input name="q3" type="checkbox" class="form-checkbox"></td>
                       <td>الالالا</td>
                    </tr>
                    <tr>
                       <td rowspan="7">الأداء الفني لرائد النشاط</td>
                       <td>1</td>
                       <td>بناء خطة النشاط و إعادتها</td>
                       <td><input name="q4" type="checkbox" class="form-checkbox"></td>
                       <td>الالالا</td>
                    </tr>
                    <tr>
                       <td>2</td>
                       <td>تكوين مجلس النشاط الطلابي</td>
                       <td><input name="q5" type="checkbox" class="form-checkbox"></td>
                       <td>الالالا</td>
                    </tr>
                    <tr>
                       <td>3</td>
                       <td>حفط سجلات العمل و إعداد التقارير و نماذج العمل</td>
                       <td><input name="q6" type="checkbox" class="form-checkbox"></td>
                       <td>الالالا</td>
                    </tr>
                    <tr>
                       <td>4</td>
                       <td>بناء خطة النشاط و إعادتها</td>
                       <td><input name="q7" type="checkbox" class="form-checkbox"></td>
                       <td>الالالا</td>
                    </tr>
                    <tr>
                       <td>5</td>
                       <td>تكوين مجلس النشاط الطلابي</td>
                       <td><input name="q8" type="checkbox" class="form-checkbox"></td>
                       <td>الالالا</td>
                    </tr>
                    <tr>
                       <td>6</td>
                       <td>حفط سجلات العمل و إعداد التقارير و نماذج العمل</td>
                       <td><input name="q9" type="checkbox" class="form-checkbox"></td>
                       <td>الالالا</td>
                    </tr>
                    <tr>
                       <td>7</td>
                       <td>حفط سجلات العمل و إعداد التقارير و نماذج العمل</td>
                       <td><input name="q10" type="checkbox" class="form-checkbox"></td>
                       <td>الالالا</td>
                    </tr>
                    <tr>
                        <td rowspan="3">مراجعة مدير المدرسة</td>
                        <td>1</td>
                        <td>بناء خطة النشاط و إعادتها</td>
                        <td><input name="q11" type="checkbox" class="form-checkbox"></td>
                        <td>الالالا</td>
                     </tr>
                     <tr>
                        <td>2</td>
                        <td>تكوين مجلس النشاط الطلابي</td>
                        <td><input name="q12" type="checkbox" class="form-checkbox"></td>
                        <td>الالالا</td>
                     </tr>
                     <tr>
                        <td>3</td>
                        <td>حفط سجلات العمل و إعداد التقارير و نماذج العمل</td>
                        <td><input name="q13" type="checkbox" class="form-checkbox"></td>
                        <td>الالالا</td>
                     </tr>
                </tbody>
            </table>
            <button class="btn btn-primary">إنشاء</button>
        </div>
    </form>
@endsection

@section('styles')
    <style>
        /* form * {
            font-size: 12px !important;
        } */
    </style>
@endsection
