@extends('layouts.app')
<?php
use Carbon\Carbon;
Carbon::setLocale('ar');
?>
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->

                @forelse ($weeks as $week)
                    <x-week-admin id="{{ $week->id }}" name="{{ $week->name }}" :days="$week->days" />
                @empty
                    <div class="col-12 alert alert-warning">
                        ليس هناك أي أسابيع ظاهرة
                    </div>
                @endforelse
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
@endsection
