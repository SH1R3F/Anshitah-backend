@extends('layouts.app')

@section('content')
<div class="card card-custom card-stretch">
    <form action="{{ route('roles.update' , ['id' => $role->id]) }}" class="needs-validation" novalidate method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header py-3">
            <div class="card-toolbar">
                <button type="submit" class="btn btn-success mr-2">تعديل</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label>إسم المجموعة</label>
                        <input type="text" class="form-control" name="name"
                        value="{{ $role->name }}" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>الصلاحيات</label>
                        <x-permissions-edit-form :id="$role->id"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
