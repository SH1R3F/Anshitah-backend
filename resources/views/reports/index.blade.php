@extends('layouts.app')

@can('إنشاء تقرير')
    @section('action')
        <a href="{{ route('reports.create') }}" class="btn btn-primary">إنشاء تقرير</a>
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
                                <td>اسم التقرير</td>
                                <td>التاريخ</td>
                                <td>المجال</td>
                                <td>التقييم</td>
                                <td>العمليات</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $r)
                            <tr>
                                <td>{{ $r->name }}</td>
                                <td>{{ $r->created_at->format('d-m-Y') }}</td>
                                <td>{{ $r->field }}</td>
                                @if($r->evaluation)
                                    <td>
                                        {{ $r->evaluation->total . '/35' }}
                                    </td>
                                @else
                                    <td>لم يتم التقييم بعد</td>
                                @endif
                                <td>
                                    <div class="d-flex">
                                        @can('تعديل التقرير')
                                            <a href="/reports/edit/{{ $r->id }}" class="btn btn-success mr-2">
                                                تعديل
                                            </a>
                                        @endcan
                                        @can('حذف التقرير')
                                            <form action="{{ route('reports.delete' , [
                                                'id' => $r->id
                                            ]) }}" method="post">
                                                @csrf
                                                <button class="btn btn-warning mr-2">حذف</button>
                                            </form>
                                        @endcan
                                        @can('عرض التقرير')
                                            <a href="{{ route('reports.show' , ['id' => $r->id]) }}" class="btn btn-info mr-2">عرض التقرير</a>
                                        @endcan
                                        @if($r->evaluation)
                                            <a href="{{ route('reports.evaluation.edit' , ['id' => $r->id]) }}" class="btn btn-danger mr-2">تعديل التقييم</a>
                                            {{-- <a href="/reports/evaluation/{{ $r->id }}" class="btn btn-info mr-2">عرض التقييم</a> --}}
                                        @else
                                            @can('تقييم')
                                                <a href="{{ route('reports.evaluation' , ['id' => $r->id]) }}" class="btn btn-dark mr-2">تقييم</a>
                                            @endcan
                                        @endif
                                        @can('طباعة التقرير')
                                            <a href="{{ route('reports.print' , ['id' => $r->id]) }}" class="btn btn-success mr-2">طباعة التقرير</a>
                                        @endcan
                                        @can('طباعة التقييم')

                                            <a href="{{ route('evaluation.print' , ['id' => $r->id]) }}" class="btn btn-dark @if(!$r->evaluation) disabled @endif">طباعة التقييم</a>
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
