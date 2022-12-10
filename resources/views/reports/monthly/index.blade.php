@extends('layouts.app')

@can('إنشاء تقرير')
    @section('action')
        <a href="{{ route('reports.monthly.create') }}" class="btn btn-primary">إنشاء تقرير</a>
    @endsection
@endcan

@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-12">
                @if ($reports->count())
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>المدرسة</td>
                                <td>التاريخ</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>العمليات</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $r)
                            <tr>
                                <td>{{ $r->school }}</td>
                                <td>{{ $r->report_date }}</td>
                                <td>{{ $r->q1 }}</td>
                                <td>{{ $r->q2 }}</td>
                                <td>{{ $r->q3 }}</td>
                                <td>{{ $r->q4 }}</td>
                                <td>{{ $r->q5 }}</td>
                                <td>{{ $r->q6 }}</td>
                                <td>{{ $r->q7 }}</td>
                                <td>
                                    <div class="d-flex">
                                        @can('تعديل التقرير')
                                            <a href="/reports-monthly/edit/{{ $r->id }}" class="btn btn-success mr-2">
                                                تعديل
                                            </a>
                                        @endcan
                                        @can('حذف التقرير')
                                            <form action="{{ route('reports.monthly.delete' , [
                                                'id' => $r->id
                                            ]) }}" method="post">
                                                @csrf
                                                <button class="btn btn-warning mr-2">حذف</button>
                                            </form>
                                        @endcan
                                        @can('طباعة التقرير')
                                            <a target="_blank" href="{{ route('reports.monthly.print' , ['id' => $r->id]) }}" class="btn btn-success mr-2">طباعة التقرير</a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="alert alert-warning">
                    لا توجد تقارير
                </div>
                @endif
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
@endsection
