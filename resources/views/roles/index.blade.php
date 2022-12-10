@extends('layouts.app')

@section('action')
<a href="{{ route('roles.create') }}" class="btn btn-primary">إنشاء مجموعة</a>
@endsection

@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-12">
                @if ($roles->count())
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>المجموعة</td>
                                <td>العمليات</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $r)
                            <tr>
                                <td>{{ $r->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('roles.edit',['id' => $r->id]) }}"  class="btn btn-success mr-2">تعديل</a>
                                        @if($r->name != 'مدير' && $r->name != 'وكيل' && $r->name != 'معلم')
                                        <form action="{{ route('roles.delete',['id' => $r->id]) }}" method="post">
                                            @csrf
                                            <button class="btn btn-warning mr-2">حذف</button>
                                        </form>
                                        @else
                                        <span class="badge badge-danger">
                                            مجموعة لا يمكن حذفها
                                        </span>
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
                    لا توجد أدوار
                </div>
                @endif
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
@endsection
