@extends('layouts.app')

@section('action')
    <a href="{{ route('ziyara.create') }}" class="btn btn-primary">إنشاء زيارة</a>
    <a href="{{ route('ziyara.print') }}"
        class="btn btn-info mx-2">طباعة الزيارات</a>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                    @if ($ziyaras->count())
                        <div class="card">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>المشرف</td>
                                        <td>المجال</td>
                                        <td>الأحد</td>
                                        <td>الإثنين</td>
                                        <td>الثلاثاء</td>
                                        <td>الأربعاء</td>
                                        <td>الخميس</td>
                                        <td>العمليات</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ziyaras as $r)
                                        <tr>
                                            <td>{{ $r->user->name }}</td>
                                            <td>{{ $r->user->field }}</td>
                                            <td>{{ $r->q1 }}</td>
                                            <td>{{ $r->q2 }}</td>
                                            <td>{{ $r->q3 }}</td>
                                            <td>{{ $r->q4 }}</td>
                                            <td>{{ $r->q5 }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('ziyara.edit', ['id' => $r->id]) }}"
                                                        class="btn btn-success mr-2">تعديل</a>
                                                    <form action="{{ route('ziyara.delete', ['id' => $r->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-warning mr-2">حذف</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            لا توجد زيارات
                        </div>
                    @endif
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
@endsection
