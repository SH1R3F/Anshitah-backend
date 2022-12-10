@extends('layouts.app')
@section('action')
<a href="{{ route('studentfields') }}" class="btn btn-primary">نشاطات الطلاب</a>
@endsection
@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            تعديل نشاط
        </h3>
        {{-- <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
            </div>
        </div> --}}
    </div>
    <!--begin::Form-->
    <form method="post" action="{{ route('studentfields.update' , ['id' => $data->id]) }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>اسم الطالب <span class="text-danger">*</span></label>
                <select name="name" class="form-control form-control-solid form-control-lg">
                    <option value="{{ $data->name }}">{{ $data->name }}</option>
                    @foreach ($students as $u)
                    <option value="{{ $u->name }}">
                        {{ $u->name }}
                    </option>
                    @endforeach
                </select>
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>الصف<span class="text-danger">*</span></label>
                <select name="saf" class="form-control form-control-solid form-control-lg">
                    <option value="{{ $data->saf }}">{{ $data->saf }}</option>
                    @foreach ($sofof as $u)
                    <option value="{{ $u }}">
                        {{ $u }}
                    </option>
                    @endforeach
                </select>
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>الفصل<span class="text-danger">*</span></label>
                <select name="fasle" class="form-control form-control-solid form-control-lg">
                    <option value="{{ $data->fasle }}">{{ $data->fasle }}</option>
                    @foreach ($fosol as $u)
                    <option value="{{ $u }}">
                        {{ $u }}
                    </option>
                    @endforeach
                </select>
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>المجال<span class="text-danger">*</span></label>
                <select name="majal" class="form-control form-control-solid form-control-lg">
                    <option value="{{ $data->majal }}">{{ $data->majal }}</option>
                    @foreach ($majals as $u)
                    <option value="{{ $u }}">
                        {{ $u }}
                    </option>
                    @endforeach
                </select>
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
