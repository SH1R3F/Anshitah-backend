@extends('layouts.app')

@section('action')
    <a href="{{ route('all.ratings.teacher') }}" class="btn btn-primary">الزيارات</a>
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
                                        <td>المادة</td>
                                        <td>عنوان الدرس</td>
                                        <td>العمليات</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ratings as $r)
                                        <tr>
                                            <td>{{ $r->teacher }}</td>
                                            <td>{{ $r->madat_tadriss }}</td>
                                            <td>{{ $r->course_title }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-info" href="{{ route('ratings.show.teacher',['id' => $r->id]) }}">عرض</a>
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
