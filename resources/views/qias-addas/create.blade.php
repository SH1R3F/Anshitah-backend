@extends('layouts.app')
@section('action')
<a href="{{ route('qiasadaas') }}" class="btn btn-primary">قياسات الأداء</a>
@endsection
@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
 إنشاء قياس أداء
        </h3>
        {{-- <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
            </div>
        </div> --}}
    </div>
    <!--begin::Form-->
    <form method="post" action="{{ route('qiasadaas.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>المدرسة<span class="text-danger">*</span></label>
                <select name="name" class="form-control form-control-solid form-control-lg">
                    <option value>أدخل إجابتك</option>
                    @foreach ($schools as $u)
                    <option value="{{ $u }}">
                        {{ $u }}
                    </option>
                    @endforeach
                </select>
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>النقاط<span class="text-danger">*</span></label>
                <input name="points" type="number" class="form-control" placeholder="إضافة نقط" />
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>سبب الإضافة<span class="text-danger">*</span></label>
                <input name="cause" type="text" class="form-control" placeholder="سبب الإضافة" />
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">إنشاء</button>
            {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
        </div>
    </form>
    <!--end::Form-->
</div>
@endsection
