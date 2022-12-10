@extends('layouts.app')
<?php
    use Carbon\Carbon;
    Carbon::setLocale('ar');
?>
@section('content')
@if(session('request'))
    <div class="flash-msg alert alert-primary">
        {{ session('request') }}
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
                                <x-td-reservation :seance="$s"/>
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
