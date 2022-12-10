@extends('layouts.app')
@section('action')
<a href="{{ route('schoolnashats') }}" class="btn btn-primary">النشاطات مدرسية</a>
@endsection
@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
 تعديل نشاط مدرسي
        </h3>
        {{-- <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
            </div>
        </div> --}}
    </div>
    <!--begin::Form-->
    <form method="post" action="{{ route('schoolnashats.update' , ['id' => $data->id]) }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>الإسم<span class="text-danger">*</span></label>
                <select name="name" class="form-control form-control-solid form-control-lg">
                    <option value="{{ $data->name }}">{{ $data->name }}</option>
                    @foreach ($users as $u)
                    <option value="{{ $u->name }}">
                        {{ $u->name }}
                    </option>
                    @endforeach
                </select>
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>عمله بالمجلس<span class="text-danger">*</span></label>
                <input name="work" type="text" class="form-control" value="{{ $data->work }}" placeholder="عمله بالمجلس" />
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>العمل المسند إليه<span class="text-danger">*</span></label>
                <input name="task" type="text" class="form-control" value="{{ $data->task }}" placeholder="العمل المسند إليه" />
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">تعديل</button>
            {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
        </div>
    </form>
    <!--end::Form-->
</div>
@endsection
