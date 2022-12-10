@extends('layouts.app')

@section('content')
<div class="card card-custom card-stretch">
    <form action="{{ route('roles.store') }}" class="needs-validation" novalidate method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header py-3">
            <div class="card-toolbar">
                <button type="submit" class="btn btn-success mr-2">إنشاء</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label>إسم المجموعة</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>الصلاحيات</label>
                        <x-permissions-form/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
