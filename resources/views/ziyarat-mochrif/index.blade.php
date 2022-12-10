@extends('layouts.app')

@section('action')
    <a href="{{ route('ziyaratmochrif.create') }}" class="btn btn-primary">إنشاء زيارة</a>
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
                                        <td>المدرسة</td>
                                        <td>التاريخ</td>
                                        <td>رائد النشاط</td>
                                        <td>العمليات</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ziyaras as $r)
                                        <tr>
                                            <td>{{ $r->school }}</td>
                                            <td>{{ $r->date }}</td>
                                            <td>{{ $r->user->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('ziyaratmochrif.edit', ['ziyaratMochrif' => $r]) }}"
                                                        class="btn btn-success mr-2">تعديل</a>
                                                    <form action="{{ route('ziyaratmochrif.delete', ['ziyaratMochrif' => $r]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-warning mr-2">حذف</button>
                                                    </form>
                                                    <a target="_blank" href="{{ route('ziyaratmochrif.print', ['ziyaratMochrif' => $r]) }}"
                                                        class="btn btn-info mr-2">طباعة</a>
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
