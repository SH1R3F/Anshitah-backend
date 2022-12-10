@extends('layouts.app')

@section('action')
    <a href="{{ route('ratings.create') }}" class="btn btn-primary">إنشاء زيارة</a>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                    @if ($ratings->count())
                        <div class="card">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>إسم الزائر</td>
                                        <td>إسم المعلم</td>
                                        <td>المادة</td>
                                        <td>عنوان الدرس</td>
                                        <td>العمليات</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ratings as $r)
                                        <tr>
                                            <td>{{ $r->visitor }}</td>
                                            <td>{{ $r->teacher }}</td>
                                            <td>{{ $r->madat_tadriss }}</td>
                                            <td>{{ $r->course_title }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('ratings.edit', ['id' => $r->id]) }}"
                                                        class="btn btn-success mr-2">تعديل</a>
                                                    <form action="{{ route('ratings.status', ['id' => $r->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @if ($r->status)
                                                            <button class="btn btn-secondary mr-2">إخفاء</button>
                                                        @else
                                                            <button class="btn btn-primary mr-2">إظهار</button>
                                                        @endif
                                                    </form>
                                                    <form action="{{ route('ratings.delete', ['id' => $r->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-warning mr-2">حذف</button>
                                                    </form>
                                                    <button class="btn btn-info">عرض</button>
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
