@extends('layouts.app')

@section('action')
    <a href="{{ route('achievements.create') }}" class="btn btn-primary">إنشاء المراكز و المنجزات</a>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                    @if ($achievements->count())
                        <div class="card">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>اسم المسابقة</td>
                                        <td>المركز</td>
                                        <td>العدد</td>
                                        <td>المرحلة</td>
                                        <td>النوع</td>
                                        <td>التاريخ</td>
                                        <td>العمليات</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($achievements as $r)
                                        <tr>
                                            <td>{{ $r->name }}</td>
                                            <td>{{ $r->rank }}</td>
                                            <td>{{ $r->number }}</td>
                                            <td>{{ $r->stage }}</td>
                                            <td>{{ $r->genre }}</td>
                                            <td>{{ $r->date->format('d-m-Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('achievements.edit', ['id' => $r->id]) }}"
                                                        class="btn btn-success mr-2">تعديل</a>
                                                    <form action="{{ route('achievements.delete', ['id' => $r->id]) }}"
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
                            لا توجد المراكز و المنجزات
                        </div>
                    @endif
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
@endsection
