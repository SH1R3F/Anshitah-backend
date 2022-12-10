@extends('layouts.app')

@section('action')
    <a href="{{ route('qiasadaas.create') }}" class="btn btn-primary mx-2">إنشاء قياس أداء</a>
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
                                        <td>المدرسة</td>
                                        <td>النقاط</td>
                                        <td>سبب الإضافة</td>
                                        <td>العمليات</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $r)
                                        <tr>
                                            <td>{{ $r->name }}</td>
                                            <td>{{ $r->points }}</td>
                                            <td>{{ $r->cause }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    {{-- <a target="_blank" href="{{ route('qiasadaas.print', ['id' => $r->id]) }}"
                                                        class="btn btn-info mr-2">عرض</a> --}}
                                                    <a href="{{ route('qiasadaas.edit', ['id' => $r->id]) }}"
                                                        class="btn btn-success mr-2">تعديل</a>
                                                    <form action="{{ route('qiasadaas.delete', ['id' => $r->id]) }}"
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
                            لا توجد قياسات أداء 
                        </div>
                    @endif
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
@endsection
