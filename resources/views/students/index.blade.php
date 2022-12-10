@extends('layouts.app')

@section('action')
    <a href="{{ route('users.create') }}" class="btn btn-primary font-weight-bolder font-size-sm mx-1">إضافة مستخدم</a>
    <a href="#" class="btn btn-success font-weight-bolder font-size-sm mx-1" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#excelStudents">رفع بيانات الطلاب</a>
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
                            <th>الفصل</th>
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
                                @if ($user->classes)
                                    {{ strval($years[explode('_', json_decode($user->classes)[0])[0]]) . '/' . explode('_', json_decode($user->classes)[0])[1] }}
                                @endif
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
<div class="modal fade" id="excelStudents" tabindex="-1"
role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">رفع بيانات الطلاب</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">
            <div>
                <form action="{{ route('import.students') }}" method="post" class="form pt-9" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 text-right col-form-label">ملف الطلاب</label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" type="file" name="file" />
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-primary font-weight-bold"
                data-dismiss="modal">إلغاء</button>
            <button type="submit" class="btn btn-primary font-weight-bold">رفع</button>
        </div>
    </form>
    </div>
</div>
</div>
<!--end::Modal Content-->
@endsection

