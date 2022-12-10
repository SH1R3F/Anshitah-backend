@extends('layouts.app')

{{-- @section('action')
    <a href="{{ route('plans.create') }}" class="btn btn-primary">إنشاء خطة</a>
@endsection --}}

@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
           
            <div class="row">
                <div class="col-12">
                    @if ($donates->count())
                        <div class="card">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>الاسم</td>
                                        <td>المدرسة</td>
                                        <td>الصف</td>
                                        <td>الفصل</td>
                                        <td>الملف</td>
                                        <td>الرابط</td>
                                        <td>العمليات</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donates as $r)
                                        <tr>
                                            <td>{{ $r->name }}</td>
                                            <td>{{ $r->school }}</td>
                                            <td>{{ $r->saf }}</td>
                                            <td>{{ $r->fasle }}</td>
                                            <td>
                                                <a target="_blank" href="{{ asset($r->file) }}" class="btn btn-danger">
                                                    الملف
                                                </a>
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{ asset($r->path) }}" class="btn btn-danger">
                                                    الرابط
                                                </a>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <form action="{{ route('donate.delete', ['id' => $r->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-warning mr-2">حذف</button>
                                                    </form>
                                                    @if($r->active)
                                                    <form action="{{ route('donate.status', ['id' => $r->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-dark mr-2">الغاء الموافقة</button>
                                                    </form>
                                                    @else
                                                    <form action="{{ route('donate.status', ['id' => $r->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-info mr-2">الموافقة</button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            لا توجد مشاركات
                        </div>
                    @endif
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
@endsection
