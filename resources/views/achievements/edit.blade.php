@extends('layouts.app')
@section('action')
<a href="{{ route('achievements') }}" class="btn btn-primary">المراكز و المنجزات</a>
@endsection
@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            تعديل المراكز و المنجزات
        </h3>
        {{-- <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
            </div>
        </div> --}}
    </div>
    <!--begin::Form-->
    <form method="post" action="{{ route('achievements.update' , ['id' => $achievement->id ]) }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>اسم المسابقة <span class="text-danger">*</span></label>
                <input name="name" type="text" class="form-control" placeholder="اسم المسابقة" value="{{ $achievement->name }}" />
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>المركز<span class="text-danger">*</span></label>
                <input name="rank" type="text" class="form-control" placeholder="المركز" value="{{ $achievement->rank }}" />
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>العدد<span class="text-danger">*</span></label>
                <input name="number" type="number" class="form-control" placeholder="العدد" value="{{ $achievement->number }}" />
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>المرحلة<span class="text-danger">*</span></label>
                <input name="stage" type="text" class="form-control" placeholder="المرحلة" value="{{ $achievement->stage }}" />
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>النوع<span class="text-danger">*</span></label>
                <input name="genre" type="text" class="form-control" placeholder="النوع" value="{{ $achievement->genre }}"/>
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>التاريخ<span class="text-danger">*</span></label>
                <input name="date" type="date" class="form-control" value="{{ $achievement->date->format('Y-m-d') }}"/>
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
