@extends('layouts.app')
<?php
use Carbon\Carbon;
Carbon::setLocale('ar');
?>
@section('content')
@section('action')
    <a href="{{ route('week.create') }}" class="btn btn-primary">إنشاء أسبوع</a>
@endsection
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            @forelse ($weeks as $week)
                <x-week id="{{ $week->id }}" name="{{ $week->name }}" status="{{ $week->status }}"
                    date="{{ $week->created_at->diffForHumans() }}" />
            @empty
                <div class="col-12 alert alert-info">
                    ليس هناك أي أسابيع
                </div>
            @endforelse
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
@endsection
