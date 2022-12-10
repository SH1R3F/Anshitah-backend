@extends('layouts.student')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!--begin::Base Table Widget 10-->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">معلوماتي الشخصية</span>
                    {{-- <span class="text-muted mt-3 font-weight-bold font-size-sm">
                        جدول جميع الإختبارت
                    </span> --}}
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-2 pb-0 mt-n3">
                <table class="table table-stripped">
                    <tbody>
                        <tr>
                            <th>الإسم الكامل</th>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <th>رقم الهوية</th>
                            <td>{{ Auth::user()->rakm_howiya }}</td>
                        </tr>
                        <tr>
                            <th>المدينة</th>
                            <td>{{ Auth::user()->city }}</td>
                        </tr>
                        <tr>
                            <th>رقم الجوال</th>
                            <td>{{ Auth::user()->mobile }}</td>
                        </tr>
                        <tr>
                            <th>السنة الدراسية</th>
                            <td>{{ Auth::user()->sana_dirassia }}</td>
                        </tr>
                        <tr>
                            <th>المدرسة</th>
                            <td>{{ Auth::user()->school }}</td>
                        </tr>
                        <tr>
                            <th>الرمز الوزاري للمدرسة</th>
                            <td>{{ Auth::user()->ramz_wizari }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--end::Body-->
        </div>
    </div>
</div>
@endsection



@section('action')
    <a href="/" class="btn btn-success mr-2">الرئيسية</a>
    <a href="{{ route('student.info') }}" class="btn btn-info">معلوماتي الشخصية</a>
@endsection
