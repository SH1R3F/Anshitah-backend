@extends('layouts.app')

@section('action')
    <a href="{{ route('users.create') }}" class="btn btn-primary font-weight-bolder font-size-sm mx-1">إضافة مستخدم</a>
    {{-- <a href="#" class="btn btn-success font-weight-bolder font-size-sm mx-1" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#excelStudents">رفع بيانات الطلاب</a> --}}
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-custom mb-2 mt-5">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>الإسم</th>
                            <th>البريد الإلكتروني</th>
                            <th>رقم الهوية</th>
                            <th>المدرسة</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rakm_howiya }}</td>
                            <td>
                                {{ $user->school }}
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-info mr-2" href="{{ route('users.show',['id' => $user->id]) }}">عرض</a>
                                    <a class="btn btn-success mr-2" href="{{ route('users.edit',['id' => $user->id]) }}">تعديل</a>
                                    <!-- <a class="btn btn-primary mr-2" href="{{ route('users.permissions',['id' => $user->id]) }}">الصلاحيات</a> -->
                                    <form action="{{ route('users.delete' , ['id' => $user->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--begin::Modal Content-->

<!--end::Modal Content-->
@endsection

