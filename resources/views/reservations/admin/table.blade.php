@extends('layouts.app')
<?php
    use Carbon\Carbon;
    Carbon::setLocale('ar');
?>
@section('content')
@if(session('status'))
    <div class="flash-msg alert alert-warning">
        {{ session('status') }}
    </div>
@endif
@if(session('accept'))
    <div class="flash-msg alert alert-success">
        {{ session('accept') }}
    </div>
@endif
@if(session('deny'))
    <div class="flash-msg alert alert-danger">
        {{ session('deny') }}
    </div>
@endif
@if(session('end'))
    <div class="flash-msg alert alert-info">
        {{ session('end') }}
    </div>
@endif
@if(session('hajz'))
    <div class="flash-msg alert alert-success">
        {{ session('hajz') }}
    </div>
@endif
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <!--begin::Col-->
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        @foreach ($headings as $h)
                            <th>{{ $h }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($week->days as $d)
                        <tr>
                            <td>
                                {{ $d->name }}
                                <hr>
                                {{ $d->date }}
                            </td>
                            @foreach ($d->seances as $s)
                                <x-td-reservation-admin :seance="$s"/>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
@endsection
