@extends('layouts.app')

@section('action')
    <a href="{{ route('plans.create') }}" class="btn btn-primary">إنشاء خطة</a>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                    @if ($plans->count())
                        <div class="card">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>المجال الأول</td>
                                        <td>الهدف الإسترتيجي</td>
                                        <td>الهدف التشغيلي</td>
                                        <td>مهمة / برنامج</td>
                                        <td>وصف المهمة / البرنامج</td>
                                        <td>الملف</td>
                                        <td>العمليات</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plans as $r)
                                        <tr>
                                            <td>{{ $r->majal_awl }}</td>
                                            <td>{{ $r->hadf_istratiji }}</td>
                                            <td>{{ $r->hadf_tachghili }}</td>
                                            <td>{{ $r->mohima }}</td>
                                            <td>{{ $r->wasf_mohima }}</td>
                                            <td>
                                                <a target="_blank" href="{{ route('plans.ijraat' , ['id' => $r->id]) }}" class="btn btn-danger">
                                                    الاجراءات
                                                </a>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('plans.edit', ['id' => $r->id]) }}"
                                                        class="btn btn-success mr-2">تعديل</a>
                                                    <form action="{{ route('plans.delete', ['id' => $r->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-warning mr-2">حذف</button>
                                                    </form>
                                                    <a href="{{ route('plans.show', ['id' => $r->id]) }}"
                                                        class="btn btn-info mr-2">عرض</a>
                                                    <a href="{{ route('plans.print', ['id' => $r->id]) }}"
                                                        class="btn btn-dark">طباعة</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            لا توجد خطط
                        </div>
                    @endif
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
@endsection
