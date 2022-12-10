@extends('layouts.app')

@section('action')
    <a href="{{ route('schoolnashats.create') }}" class="btn btn-primary mx-2">إنشاء نشاط مدرسي</a>
    <a href="{{ route('schoolnashats.print') }}" class="btn btn-success">طباعة نشاط مدرسي</a>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                    @if ($data->count())
                        <div class="card">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>الإسم</td>
                                        <td>عمله بالمجلس</td>
                                        <td>العمل المسند إليه</td>
                                        <td>العمليات</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $r)
                                        <tr>
                                            <td>{{ $r->name }}</td>
                                            <td>{{ $r->work }}</td>
                                            <td>{{ $r->task }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    {{-- <a target="_blank" href="{{ route('schoolnashats.print', ['id' => $r->id]) }}"
                                                        class="btn btn-info mr-2">عرض</a> --}}
                                                    <a href="{{ route('schoolnashats.edit', ['id' => $r->id]) }}"
                                                        class="btn btn-success mr-2">تعديل</a>
                                                    <form action="{{ route('schoolnashats.delete', ['id' => $r->id]) }}"
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
                            لا توجد نشاطات مدرسية
                        </div>
                    @endif
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
@endsection
