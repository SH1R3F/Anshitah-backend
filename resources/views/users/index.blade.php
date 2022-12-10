@extends('layouts.app')

@section('action')
    <a href="{{ route('users.create') }}" class="btn btn-primary">إضافة مستخدم</a>
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
                            <th>الأدوار</th>
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
                                <div class="d-flex">
                                    @foreach ($user->roles as $role)
                                        <span class="badge badge-warning text-white mr-2">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-info mr-2" href="{{ route('users.show',['id' => $user->id]) }}">عرض</a>
                                    <a class="btn btn-success mr-2" href="{{ route('users.edit',['id' => $user->id]) }}">تعديل</a>
                                    <a class="btn btn-primary mr-2" href="{{ route('users.permissions',['id' => $user->id]) }}">الصلاحيات</a>
                                    <a class="btn btn-dark mr-2" href="{{ route('folders.user',['id' => $user->id]) }}">الملفات</a>
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

@endsection

