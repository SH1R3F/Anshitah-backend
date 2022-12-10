@extends('layouts.app')
@section('action')
<a href="{{ route('tolabnashats') }}" class="btn btn-primary">النشاطات طلابية</a>
@endsection
@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
 إنشاء نشاط طلابي
        </h3>
        {{-- <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
            </div>
        </div> --}}
    </div>
    <!--begin::Form-->
    <form method="post" action="{{ route('tolabnashats.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>الإسم<span class="text-danger">*</span></label>
                <select name="name" class="form-control form-control-solid form-control-lg">
                    <option value>أدخل إجابتك</option>
                    @foreach ($users as $u)
                    <option value="{{ $u->name }}">
                        {{ $u->name }}
                    </option>
                    @endforeach
                </select>
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>عمله باللجنة<span class="text-danger">*</span></label>
                <input name="work" type="text" class="form-control" placeholder="عمله باللجنة" />
                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
            </div>
            <div class="form-group">
                <label>الملاحظات<span class="text-danger">*</span></label>
                <input name="note" type="text" class="form-control" placeholder="الملاحظات" />
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
