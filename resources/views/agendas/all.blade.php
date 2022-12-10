@extends('layouts.app')

@section('action')
    <a href="{{ route('agendas.create') }}" class="btn btn-primary">إنشاء أجندة</a>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                    @if ($agendas->count())
                        <div class="card">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>اسم البرنامج</td>
                                        <td>تاريخ البداية</td>
                                        <td>تاريخ النهاية</td>
                                        <td>العمليات</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agendas as $r)
                                        <tr>
                                            <td>{{ $r->name }}</td>
                                            <td>{{ $r->date_begin }}</td>
                                            <td>{{ $r->date_end }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('agendas.edit', ['id' => $r->id]) }}"
                                                        class="btn btn-success mr-2">تعديل</a>
                                                    <form action="{{ route('agendas.delete', ['id' => $r->id]) }}"
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
                            لا توجد أجندة
                        </div>
                    @endif
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
@endsection
