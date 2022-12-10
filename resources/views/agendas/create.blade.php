@extends('layouts.app')
@section('action')
<a href="{{ route('agendas') }}" class="btn btn-primary">الأجندة</a>
@endsection
@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            إنشاء أجندة
        </h3>
        {{-- <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
            </div>
        </div> --}}
    </div>
    <!--begin::Form-->
    <form method="post" action="{{ route('agendas.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>اسم البرنامج <span class="text-danger">*</span></label>
                <input name="name" type="text" class="form-control" placeholder="اسم البرنامج" />
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>تاريخ البداية<span class="text-danger">*</span></label>
                <input name="date_begin" type="datetime-local" class="form-control"/>
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>تاريخ النهاية<span class="text-danger">*</span></label>
                <input name="date_end" type="datetime-local" class="form-control" />
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
